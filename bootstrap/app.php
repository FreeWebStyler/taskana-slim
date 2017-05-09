<?php

use Respect\Validation\Validator as v;

session_start();

require __DIR__ . '/../vendor/autoload.php';

//$user = new \App\Models\User; var_dump($user);die;

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver'    => 'sqlite',
            'database'  => __DIR__ . '/../db/taskana.sqlite',
            //'database'  => '/home/alex/www/taskana/db/taskana.sqlite',
            'prefix'    => ''
        ]
    ]
]);

require __DIR__ . '/../app/routes.php';

$container = $app->getContainer();

//$container = $app->getContainer();
//$r = $app->getContainer()->get('router')->pathFor('home'); pred($r);
//$container['app'] =&$app;

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

//$container['routerr'] = $container->get('router');
/*$container['routerr'] = function($container) use ($app){
    return $app->get('router');
};*/

$container['view'] = function($container){
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => false,
        'debug' => true
    ]);

    $view->addExtension(new Twig_Extension_Debug());

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));
    return $view;
};

$container['validator'] = function($container){
    return new \App\Validation\Validator;
};

$container['HomeController'] = function($container){
    //return new \App\Controllers\HomeController($container->view);
    return new \App\Controllers\HomeController($container);
};

$container['AuthController'] = function($container) use ($app){
    return new \App\Controllers\Auth\AuthController($container);
};

$container['csrf'] = function($container){
	return new \Slim\Csrf\Guard;
};

$app->add(new \App\Middleware\ValidationErrors($container));
$app->add(new \App\Middleware\PreviousInput($container));
$app->add(new \App\Middleware\CsrfView($container));

$app->add($container->csrf);

v::with('App\\Validation\\Rules\\');