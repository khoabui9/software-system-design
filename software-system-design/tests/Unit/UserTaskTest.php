<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\users;
use App\projects;
use App\tasks;

class UserTaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
  
		public function testTaskAssociation()
        {   
        $user1 = new users();
        $user1->name = 'new person 2';
        $user1->email = 'fake2@domain.com';
        $user1->password = 'test123';
        $user1->save();

        $task4 = new tasks();
        $task4->name = 'task4';
        $task4->description = 'this is task4';
        $task4->date_created = date("2017-3-3 H:i:s");
		$task4->date_ended = date("2017-5-24 H:i:s");
        $task4->save();
        
        $task4->user()->save($user1); 
	}
}
