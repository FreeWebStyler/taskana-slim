<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig as View;
use \Illuminate\Database\Capsule\Manager as Capsule;

class HomeController extends Controller
{
    protected $container;

    //public function __construct(View $view){
    public function __construct($container){
        $this->container = $container;
        //$this->view = $container->view;
        //$this->db   = $container->db;
        //debug($container->db);
        //die;
    }

    public function index($request, $response){
        //debug($this);        die;
        /*User::create([
            'name'  => 'Alex',
            'email' => 'mymail@domain.com',
            'password' => '123'
        ]);*/
        //$user = User::where('id', 4)->first(); debug($user->email);

/*$table = Capsule::table('users');

        Capsule::schema()->create('users', function($table)
{
    $table->increments('id');
    $table->string('email')->unique();
    $table->timestamps();
});*/

        //return 'Home controller';
        $user = $this->container->db->table('users')->where('id', 1)->first();
        debug($user->email); die;
        //$user = $this->db;
        //$user = $this->view;

        //var_dump($this);
        //var_dump($this->container->db);
        //var_dump($this->db);

        //$user = $this->db->table('users')->find(1);
        return $this->view->render($response, 'home.twig');
    }
}