<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    //
    public function user() {
        return $this -> belongsToMany('App\users');
    }
}
