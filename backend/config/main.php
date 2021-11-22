<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [        
        'personal' => [
            'class' => 'backend\modules\personal\Module',
        ],
        'meeting' => [
            'class' => 'backend\modules\meeting\Module',
        ],
        'department' => [
            'class' => 'backend\modules\department\Module',
        ],
    ],
    'components' => [
        'session' => [
            'name' => 'APPBACKEND',
        ],        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@backend/themes/adminlte/views'
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => false,
            'showScriptName' => true,
        ],
        'urlManagerFrontend' => [
                'class' => 'yii\web\urlManager',
                'baseUrl' => '/smartmeeting/frontend/web',
                'scriptUrl'=>'/smartmeeting/frontend/web/index.php',
                'enablePrettyUrl' => false,
                'showScriptName' => true,
        ],
    ],
    'params' => $params,
];
