<?php

/*
$app->get('/home', function ($request, $response){

    //return 'Home';
    return $this->view->render($response, 'home.twig');

});*/

$app->get('/', 'HomeController:index')->setName('home');
$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app->post('/auth/signup', 'AuthController:postSignUp');