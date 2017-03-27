<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];
    //
    public function user() {
         return $this->belongsToMany('App\User', 'user_project', 
        'project_id', 'user_id')->withTimestamps();
           
    // return $this->belongsToMany('App\users', 'user_project', 
    //   'user_id', 'project_id')->withTimestamps();
    }

    public function task() {
        return $this->hasMany('App/Task');
    }
    // protected $fillable = ['name'];
}
