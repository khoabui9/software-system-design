<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    //
    public function user() {
        return $this -> belongsToMany('App\users');
    }

    public function project() {
        return $this -> belongsTo('App\projects');
    }
}
