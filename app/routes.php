<?php

/*
$app->get('/home', function ($request, $response){

    //return 'Home';
    return $this->view->render($response, 'home.twig');

});*/

$app->get('/', 'HomeController:index');