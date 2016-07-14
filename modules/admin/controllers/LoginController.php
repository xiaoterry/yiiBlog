<?php

namespace app\modules\admin\controllers;
use app\modules\admin\models\Admin;
use app\modules\admin\models\LoginForm;
use yii;
use yii\helpers\Url;

class LoginController extends \yii\web\Controller
{
    public $layout = 'login';

    /**
     * @后台登录功能
     * @return string|yii\web\Response
     */
    public function actionLogin()
    {
        $request = Yii::$app->request;
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(Url::toRoute('/admin/index/index'));
        }

        $loginform = new LoginForm();
        if ($request->isPost) {
            if ($loginform->load($request->post()) && $loginform->validate()) {
                $adminIdentity = Admin::findByUsername($loginform->username);
                Yii::$app->user->login($adminIdentity, $loginform->rememberMe ? 3600*24*30 : 0);
                return $this->redirect(Url::toRoute('/admin/index/index'));
            }
        }

        return $this->render('login', [
            'loginform' => $loginform,
        ]);
    }
    
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('login');
    }

}
