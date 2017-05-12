<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/7
 * Time: 9:32
 */

namespace app\modules\admin\controllers;

use app\modules\admin\models\AuthItem;
use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use app\modules\admin\models_ext\AuthAssignmentExt;
use app\modules\admin\models_ext\AuthItemExt;
class RoleController extends Controller{

    public $layout = 'main';

    /**
     * 角色列表
     */
    public function actionRoleList(){

        $auth = Yii::$app->authManager;

        $role_list = $auth->getRoles();

        return $this->render('role_list',[
            'role_list' => $role_list,
        ]);

    }

    /**
     * 角色添加与编辑
     */
    public function actionRoleEdit(){

        $auth = Yii::$app->authManager;
        $session = Yii::$app->session;
        $request = Yii::$app->request;

        if($request->get('rolename') && $auth->getRole($request->get('rolename'))){
            $role = $auth->getRole($request->get('rolename'));

        }else{
            $role = new AuthItem();
        }

        if ($request->isPost && $request->post('submit') == 'submit') {
            $role = $auth->createRole($request->post('rolename'));
            $role->description = $request->post('roledesc');
            if($request->get('rolename')){
                if ($auth->update($request->get('rolename'),$role)) {
                    $session->setFlash('success', '操作成功');
                } else {
                    $session->setFlash('success', '操作失败');
                }
            }else{
                if ($auth->add($role)) {
                   $session->setFlash('success', '操作成功');
                } else {
                    $session->setFlash('success', '操作失败');
                }
            }
            $this->redirect(Url::toRoute('role-list'));
        }

        return $this->render('role_edit',[
            'role' => $role,
        ]);
    }

    /**
     * 角色删除
     */
    public function actionRoleDelete(){

        $auth = Yii::$app->authManager;
        $session = Yii::$app->session;
        $request = Yii::$app->request;

        $rolename = $request->get('rolename');
        $authAssignmentExt = new AuthAssignmentExt();
        $admin_list = $authAssignmentExt->getAssignmentByRole($rolename);
        if(!$admin_list){
            $role = $auth->getRole($rolename);
            if($role && $auth->removeChildren($role) && $auth->remove($role)){
                $session->setFlash('success', '操作成功');
            }else{
                $session->setFlash('success', '操作失败');
            }
        }else{
            $session->setFlash('success', '角色已被引用,不允许删除');
        }
        $this->redirect(Url::toRoute('role-list'));
    }

    /**
     * 角色权限设置
     */
    public function actionRolePriv(){

        $request = Yii::$app->request;
        $auth    = Yii::$app->authManager;
        $session = Yii::$app->session;

        if($request->isGet){

            $authItemExt = new AuthItemExt();
            $menus = $authItemExt->getMenusAndPriv();
            $rolename = $request->get('rolename');
            return $this->render('role_priv',[
                'menus'    => $menus,
                'rolename' => $rolename,
            ]);
        }
        if($request->isPost && $request->post("submit")=='提交'){
            try{
                $rolename = $request->post('rolename');
                $role = $auth->getRole($rolename);
                $privs = $request->post('priv');
                $auth->removeChildren($role);
                foreach($privs as $p){
                    $permission =  $auth->getPermission($p);
                    if($permission)$auth->addChild($role,$permission);
                }
                $session->setFlash('success', '操作成功');
                $this->redirect(Url::toRoute('role-list'));
            }catch(\yii\base\Exception $ex){
                $session->setFlash('error', '操作失败');
                $this->redirect(Url::toRoute('role-list'));
            }
        }

    }


    /**
     * 角色成员列表
     */
    public function actionAdminList(){
        $request = Yii::$app->request;

        $rolename = $request->get('rolename');

        $authItem = AuthItem::findOne($rolename)->toArray();

        $authAssignmentExt = new AuthAssignmentExt();

        $admin_list = $authAssignmentExt->getAssignmentByRole($rolename);

        return $this->render('admin_list',[
            'rolename' => $authItem['description'],
            'admin_list' => $admin_list
        ]);
    }

    public function showPrivTree($menus,$rolename){
        $auth = Yii::$app->authManager;
        $permission = $auth->getPermissionsByRole($rolename);
        //var_dump($permission);exit;
        $treeStr = '';
        foreach($menus as $menu){

            $treeStr .= '<div class="tree-folder">';
            $treeStr .= '<div class="tree-folder-header">';
            $treeStr .= '<i class="fa fa-folder"></i>';
            if(isset($permission[$menu['name']]) && !empty($permission[$menu['name']])){
                $treeStr .= '<div class="tree-folder-name"><input type="checkbox" checked="checked" name="priv[]" value="'.$menu['name'].'">'.$menu['description'].'</div>';
            }else{
                $treeStr .= '<div class="tree-folder-name"><input type="checkbox" name="priv[]" value="'.$menu['name'].'">'.$menu['description'].'</div>';
            }

            $treeStr .= '</div>';
            $treeStr .= '<div class="tree-folder-content" style="display:none;">';
            if($menu['child']){
                $treeStr .= $this->showPrivTree($menu['child'],$rolename);
            }
            $treeStr .= '</div>';
            $treeStr .= '<div class="tree-loader"></div>';
            $treeStr .= '</div>';
        }
        return $treeStr;
    }

    public function actionTest()
    {
        dump(123);
    }
}