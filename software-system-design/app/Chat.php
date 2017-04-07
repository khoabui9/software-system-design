<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    public function user() {
         return $this->belongsToMany('App\User', 'user_chat', 
        'chat_id', 'user_id')->withTimestamps();
    }

    public function project() {
         return $this -> belongsTo('App\Project');
    }

    public function message() {
        return $this->hasMany('App\Message');
    }
}
