<?php

namespace App\Controllers\Auth;

//use Slim\App as Slim; NOT WORK(
//use Slim\App as Slim;
use App\Models\User;
use App\Controllers\Controller;
//use Slim\Views\Twig as View;
use Respect\Validation\Validator as v;

class AuthController extends Controller
{
    public function getSignUp($requset, $response){
        return $this->view->render($response, 'auth/signup.twig');
    }

    public function postSignUp($request, $response){
        //debug($request->getParams());
        //pred($this->router);

        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
            'name'  => v::noWhitespace()->notEmpty()->alpha(),
            'password' => v::noWhitespace()->notEmpty()
        ]);

        if($validation->failed()){
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }

        $user = User::create([
            'email' => $request->getParam('email'),
            'name'  => $request->getParam('name'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT)
        ]);
        //pred($this->container->router);
        //debug($this->view);die;
        //$app = \Slim\App::getInstance();
        //$app = Slim::getInstance();
        //pred($app);
        //pred(get_class_methods($this->app));

        /*echo $app->getContainer()->get('router')->pathFor('hello', [
    'name' => 'Josh'
]);*/
        return $response->withRedirect($this->router->pathFor('home'));

    }
}