<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Admin;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii;
use yii\web\NotFoundHttpException;


class AdminController extends Controller
{
    public $layout = 'main';

    public $defaultAction = 'admin-list';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['admin-list', 'admin-edit', 'admin-delete'],
                'rules' => [
                    [
                        'actions' => ['admin-list', 'admin-edit', 'admin-delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * 管理员列表页
     */
    public function actionAdminList()
    {
        $admins = Admin::find();
        $pagination = new Pagination([
            'defaultPageSize' => 8,
            'totalCount' => $admins->count(),
        ]);
        $adminsList = $admins->select(['id', 'username', 'email'])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy('id asc')
            ->with('authItem') // 使用with()提高sql性能
            ->asArray()
            ->all();

        return $this->render('admin_list', [
            'admins' => $adminsList,
            'pagination' => $pagination,
        ]);
    }

    /**
     * 添加 修改管理员
     * @return string|yii\web\Response
     * @throws yii\base\Exception
     */
    public function actionAdminEdit()
    {
        $session = Yii::$app->session;
        $request = Yii::$app->request;
        $auth = Yii::$app->authManager;

        if ($request->get('id')) {
            $admin = Admin::findIdentity($request->get('id'));
            $admin->role = $admin->authAssignment ? $admin->authAssignment->item_name : null;
            $admin->scenario = 'edit';
        } else {
            $admin = new Admin(['scenario' => 'add']);
        }

        if ($request->isPost) {
            $admin->load($request->post());
            if ($admin->scenario == 'add') {
                $admin->password_hash = Yii::$app->getSecurity()->generatePasswordHash($admin->password);
            } elseif ($admin->scenario == 'edit' && !empty($request->post('Admin')['password'])) {
                $admin->password_hash = Yii::$app->getSecurity()->generatePasswordHash($request->post('Admin')['password']);
            }

            if ($admin->save() && $admin->editAndBindingRole()) {
                return $this->redirect('admin-list');
            } else {
                $session->setFlash('danger', '操作失败');
            }
        }

        // 获取角色
        $roles = $auth->getRoles();
        $roles = ArrayHelper::map($roles,'name', 'description');

        return $this->render('admin_edit', [
            'admin' => $admin,
            'roles' => $roles,
        ]);
    }

    public function actionAdminDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', '删除成功');
        return $this->redirect('admin-list');
    }

    /**
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}