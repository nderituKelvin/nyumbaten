<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model{
    protected $fillable = [
        'message', 'user', 'group',
    ];

    public function User(){
        return $this->belongsTo('\App\User', 'user');
    }
}
