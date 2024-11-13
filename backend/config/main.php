<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'modules' => [
        'account' => [
            'class' => 'backend\modules\account\Module',
        ],
        'carForTaxi' => [
                'class' => 'backend\modules\carForTaxi\Module',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]

    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
//                'all_messages'=>[
//                    'class' => 'yii\log\DbTarget',
//                    'levels' => ['info','trace','error', 'warning'],
//                ],
                'problems'=>[
                    'class' => yii\log\EmailTarget::class,
                    'levels' => yii\log\Logger::LEVEL_ERROR,
                    'message' => [
                        'from' => 'admin@example.com',
                        'to'=>'zigyiass@gmail.com'
                    ]
                ],
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'urlManagerFrontEnd' => [
        'class' => 'yii\web\UrlManager',
        'hostInfo' => 'http://frontend.nb_taxi.almaz',
    ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;port=3306;dbname=nb_taxi;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'enableQueryCache' => true,
        ],
        'mail'=>[
            'class' => 'yii\swiftmailer\Mailer',
            'messageConfig'=>[
                'from'=>'zigyiass@gmail.com',
                'charset'=>'utf-8',
            ],
            'transport'=>[
                'class'=>'Swift_SmtpTransport',
                'host'=>'smtp.gmail.com',
                ]
        ],
        'cache' => [
           'class' => 'yii\caching\DbCache',
            'db' => [
                'class' => 'yii\db\Connection',
                'dsn' => 'mysql:host=localhost;port=3306;dbname=nb_taxi;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock',
                'username' => 'root',
                'password' => 'root',
                'charset' => 'utf8',
                'enableSchemaCache' => true,
                'enableQueryCache' => true,
            ],


        ]
    ],

    'params' => $params,
];
