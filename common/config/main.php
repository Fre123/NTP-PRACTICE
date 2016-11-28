<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Asia/Shanghai', //time zone affect the formatter datetime format
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //'view' => [
        //     'theme' => [
        //         'pathMap' => [
        //            '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
        //         ],
        //     ],
        //],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
          ],

    ],
];
