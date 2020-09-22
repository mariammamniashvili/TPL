<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_register extends Model
{
     public $system_id = 'system_id';
     public $first_name = 'first_name';
     public $last_name = 'last_name';
     public $user_id = 'user_id';
     public $phone = 'phone';
     public $email = 'email';
     public $birthday = 'birthday';
     public $manufacturer = 'manufacturer';
     public $model = 'model';
     public $issue_date = 'issue_date';
     public $registration_number = 'registration_number';
     public $photo = 'photo';
}
