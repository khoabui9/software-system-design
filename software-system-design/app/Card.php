<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    public function project() {
        return $this -> belongsTo('App\Project');
    }

    public function task() {
        return $this->hasMany('App\Task');
    }
}
