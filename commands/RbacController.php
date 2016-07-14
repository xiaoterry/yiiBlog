<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/7/12
 * Time: 12:08
 */
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionTest()
    {
        $auth = Yii::$app->authManager;
//        $tt = $auth->createPermission('某某专题');
//        $tt->description = '这个是某某专题';
//        $auth->add($tt);
//        $role = $auth->createRole('某某管理员');
//        $role->description = '我是某某管理员';
//        $auth->add($role);

        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id （译者注：user表的id）
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($author, 30);
    }
}