<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
	
	/**
	* Run the database seeds.
	     *
	     * @return void
	     */
	    public function run()
	    {
		//
		DB::table('tasks')->delete();
		$tasks = [
		            [
		               'name' => 'task1',
				'description' => 'this is task1',
		        'date_created' => date("2017-3-2 H:i:s"),
		        'date_ended' => date("2017-5-24 H:i:s"),
				'user_id' =>  2,
		        'project_id' =>  3
		            ],
		            [
		              'name' => 'task2',
				'description' => 'this is task2' ,
		         'date_created' => date("2017-3-2 H:i:s"),
		        'date_ended' => date("2017-5-24 H:i:s"),
		        'user_id' =>  3,
				'project_id' =>  1
		            ],
		            [
		               'name' => 'task3',
				'description' => 'this is task3' ,
		         'date_created' => date("2017-3-2 H:i:s"),
		        'date_ended' => date("2017-5-24 H:i:s"),
		        'user_id' =>  1,
				'project_id' => 2
		            ]
		        ];
		DB::table('tasks')->insert($tasks);
	}
}
