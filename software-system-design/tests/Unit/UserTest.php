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
        $project->user_id = 2;
        //$project->user()->associate($user);
        //$user->project->save($project);
        $project->save();
       
       $this->assertEquals(2, $project->user_id);

        $project->delete();
        $user->delete();
    }
}
