<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\users;
use App\projects;
use App\tasks;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAssociation()
    {

        $user = new users();
        $user->name = 'John';
        $user->email = 'John@domain.com';
        $user->password = '123';
        $user->save();

        $project = new projects();
        $project->name = 'project4';
        $project->description = 'this is project4';
        $project->user_id = 1;
        //$project->name = 'project4';
        //$project->user()->associate($user);
        $project->save();
       
        $project->delete();
        $user->delete();
    }
}
