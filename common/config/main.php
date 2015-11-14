<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'sys_timezone' => [
            'class' => 'common\modules\sys_timezone\Module',
        ],
    ],
];
