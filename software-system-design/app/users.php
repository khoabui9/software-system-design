<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
    public function users() {
        
    }

    public function project() {
        return $this->hasMany('App\projects');
    }

    public function task() {
        return $this->hasMany('App\tasks');
    }
}
