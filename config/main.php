<?php
return [
    'root_dir' => __DIR__ . "/../",
    'controllers_namespace' => 'app\controllers\\',
    'templates_dir' => __DIR__ . '/../views/',
    'vendor_dir' => __DIR__ . '/../vendor/',
    'components' => [
        'db' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '1234',
            'database' => 'books',
            'charset' => 'utf8'
        ],
        'db_remote' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'mysql6002.site4now.net',
            'login' => 'a3ab19_silentk',
            'password' => 'volga2018',
            'database' => 'db_a3ab19_silentk',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => \app\services\Request::class
        ],
        'sessions' => [
            'class' => \app\services\Sessions::class
        ]
    ]
];
