<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function user() {
        return $this->belongsToMany('App\User', 'user_task', 
        'task_id', 'user_id')->withTimestamps();
    }

    public function project() {
        return $this -> belongsTo('App\Project');
    }
}
