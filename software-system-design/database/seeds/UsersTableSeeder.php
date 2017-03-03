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
		               'name' => 'khoabui',
				'email' => 'khoa@domain.com' ,
				'password' =>  Hash::make('test123')
		            ],
		            [
		               'name' => 'jiri',
				'email' => 'jiri@domain.com' ,
				'password' =>  Hash::make('abc123')
		            ],
					   [
		             'name' => 'jake',
				'email' => 'jake@domain.com' ,
				'password' =>  Hash::make('xyz123')
		            ]
		        ];
		
		DB::table('users')->insert($users);
				
		
	
	}
}
