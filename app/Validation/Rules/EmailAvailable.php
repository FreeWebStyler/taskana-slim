<?php

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class EmailAvailable extends AbstractRule {
    public function validate($input){
        //debug($input); return false;
        //return !User::where('email', $input)->count == 0;
        return !User::where('email', $input)->exists();
    }
}