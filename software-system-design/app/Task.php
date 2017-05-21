<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
        protected $fillable = [
        'name',
        'description',
        'date_created',
        'date_ended', 
        'project_id',
        'card_id'
        ];
    //

    public function user() {
        return $this->belongsToMany('App\User', 'user_task', 
        'task_id', 'user_id')->withTimestamps();
    }

    public function project() {
        return $this -> belongsTo('App\Project');
    }
    public function card() {
        return $this -> belongsTo('App\Card');
    }
}
