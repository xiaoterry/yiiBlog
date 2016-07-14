<?php

namespace app\modules\admin\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii;

class IndexController extends Controller
{
    public $layout = 'main';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex(){
//        dump(Yii::$app->user->identity->username);
        return $this->render('index');
    }
}