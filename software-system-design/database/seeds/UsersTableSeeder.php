<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	
	
	/**
	* Run the database seeds.
		     *
		     * @return void
		     */
	
	
	
	public function run()
		    {
		//
		DB::table('users')->delete();
		$users = [
			   [
		               'name' => 'admin',
				'email' => 'admin@domain.com' ,
				'password' =>  Hash::make('admin'),
				'role' => 2
		            ],
		            [
		               'name' => 'khoabui',
				'email' => 'khoa@domain.com' ,
				'password' =>  Hash::make('test123'),
				'role' => 1
		            ],
		            [
		               'name' => 'jiri',
				'email' => 'jiri@domain.com' ,
				'password' =>  Hash::make('abc123'),
				'role' => 1
		            ],
					   [
		             'name' => 'jake',
				'email' => 'jake@domain.com' ,
				'password' =>  Hash::make('xyz123'),
				'role' => 1
		            ]
		        ];
		
		DB::table('users')->insert($users);
				
		
	
	}
}
