<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'name', 'phone', 'usertype', 'status', 'password'
    ];
}

