<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Project;
use App\Task;

class UserTest extends TestCase
{
	
	
/**
* A basic test example.
*
* @return void
*/
	public function testProjectAssociation()
	{
		$user = new User();
		$user->name = 'new person';
		$user->email = 'fake@domain.com';
		$user->password = 'test123';
		$user->save();
		
		//this test show project id doesnt exist in database
		$project4 = new Project();
		$project4->name = 'project4';
		$project4->description = 'this is project4';
		$project4->save();
		
	 	$project4->user()->save($user); 
	}
	
}
