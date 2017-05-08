<?php

namespace App\Controllers;

//use Slim\Views\Twig as View;
use Slim\Views\Twig as View;
use \Illuminate\Database\Capsule\Manager as Capsule;

class HomeController extends Controller
{
    protected $container;

    //public function __construct(View $view){
    public function __construct($container){
        $this->view = $container->view;
        $this->db   = $container->db;
        //debug($container->db);
        //die;
    }

    public function index($request, $response){

/*$table = Capsule::table('users');

        Capsule::schema()->create('users', function($table)
{
    $table->increments('id');
    $table->string('email')->unique();
    $table->timestamps();
});*/

        //return 'Home controller';
        //$user = $this->db->table('users')->where('id', 1);
        //$user = $this->db;
        //$user = $this->view;
        //echo '<pre>';
        //var_dump($this);
        //var_dump($this->container->db);
        //var_dump($this->db);
        //var_dump($user);
        //die;
        $user = $this->db->table('users')->find(1);
        var_dump($user);
        die;
        return $this->view->render($response, 'home.twig');
    }
}