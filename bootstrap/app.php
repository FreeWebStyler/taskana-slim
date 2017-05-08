<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

//$user = new \App\Models\User;

//var_dump($user);die;

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver'    => 'sqlite',
            //'database'  => __DIR__ . '/../db/taskana.sqlite',
            'database'  => '/home/alex/www/taskana/db/taskana.sqlite',
            'prefix'    => ''
        ]
    ]
]);

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db'], 'default');
$capsule->setAsGlobal();
$capsule->bootEloquent();
//var_dump($capsule); die;
$container['db'] = function($container) use ($capsule) {
    return $capsule;
};
//var_dump($container['settings']['db']); die;
//var_dump($container['db']); die;

$container['view'] = function($container){

    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => false,
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    return $view;
};

$container['HomeController'] = function($container){
    //return new \App\Controllers\HomeController($container->view);
    return new \App\Controllers\HomeController($container);
};

require __DIR__ . '/../app/routes.php';