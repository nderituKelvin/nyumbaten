<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model{
    protected $fillable = [
        'user', 'status', 'group'
    ];

    public function User(){
        return $this->belongsTo('\App\User', 'user');
    }
}
