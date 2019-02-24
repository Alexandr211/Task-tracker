<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application\json' => 'yii\web\JsonParser',
                ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'enableSession' => true,
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
   //     'view' => [
     //      'theme' => [
         //       'basePath' => '@app/themes/basic',
         //       'baseUrl' => '@web/themes/basic',
         //       'pathMap' => [
         //             '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app',
         //           '@app/views' => '@app/themes/basic',
         //           '@app/modules' => '@app/themes/basic/modules',
          //          '@app/widgets' => '@app/themes/basic/widgets',
          //      ]
         //      'basePath' => '@vendor/path/to/theme',
         //      'basePath' => '@app/views',
      //      ]
    //    ]

        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'taskapi'],
            ],
        ],

    ],
    'params' => $params,
];