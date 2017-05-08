<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

class HomeController extends Controller
{

    protected $container;

    public function __construct(View $view){
        $this->view = $view;
    }

    public function index($request, $response){
        //return 'Home controller';
        return $this->view->render($response, 'home.twig');
    }
}