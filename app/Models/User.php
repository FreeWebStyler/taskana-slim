<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Slim\Views\Twig as View;

/**
* User
*/
class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'email',
        'name',
        'password',
    ];
    /*public functuin index($request, $response)
    {


    }*/
}