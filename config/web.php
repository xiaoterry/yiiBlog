<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'modules'=>[
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'imageAllowExtensions' => ['jpg','png','gif'],
        ],
        'admin' => [
            'class' => 'app\modules\admin\Admin',
        ],
    ],
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'vWP4PUOGKJhfDQvoQmBXZQz8fwiAB0dq',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\admin\models\Admin',
            'enableAutoLogin' => true,
            'loginUrl' => ['admin/login/login'],

        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
//            'errorAction' => 'admin/common/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
//        'session' => [
//            'class' => 'yii\web\DbSession',
//            'db' => 'db',  // 数据库连接的应用组件ID，默认为'db'.
//            'sessionTable' => 'session', // session 数据表名，默认为'session'.
//
//        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.83'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.83'],
    ];
}

return $config;
