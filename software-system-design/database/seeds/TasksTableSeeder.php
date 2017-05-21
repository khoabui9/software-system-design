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
				'project_id' => '3',
				'card_id' => '1',
		        'date_created' => date("2017-03-02 H:i:s"),
		        'date_ended' => date("2017-05-24 H:i:s"),
				
		            ],
		            [
		              'name' => 'task2',
				'description' => 'this is task2' ,
				'project_id' => '2',
				'card_id' => '1',
		         'date_created' => date("2017-03-02 H:i:s"),
		        'date_ended' => date("2017-05-24 H:i:s"),
		      
		            ],
		            [
		               'name' => 'task3',
				'description' => 'this is task3',
				'project_id' => '1',
				'card_id' => '2',
		         'date_created' => date("2017-03-02 H:i:s"),
		        'date_ended' => date("2017-05-24 H:i:s"),
		      
		            ],
					 [
		               'name' => 'task4',
				'description' => 'this is task3' ,
				'project_id' => '1',
				'card_id' => '3',
		         'date_created' => date("2017-03-02 H:i:s"),
		        'date_ended' => date("2017-05-24 H:i:s"),
		      
		            ],
					 [
		               'name' => 'task5',
				'description' => 'this is task3' ,
				'project_id' => '1',
				'card_id' => '2',
		         'date_created' => date("2017-03-02 H:i:s"),
		        'date_ended' => date("2017-05-24 H:i:s"),
		      
		            ],
					 [
		               'name' => 'task6',
				'description' => 'this is task3' ,
				'project_id' => '2',
				'card_id' => '1',
		         'date_created' => date("2017-03-02 H:i:s"),
		        'date_ended' => date("2017-05-24 H:i:s"),
		      
		            ],
					 [
		               'name' => 'task7',
				'description' => 'this is task3' ,
				'project_id' => '3',
				'card_id' => '1',
		         'date_created' => date("2017-03-02 H:i:s"),
		        'date_ended' => date("2017-05-24 H:i:s"),
		      
		            ],
					 [
		               'name' => 'task8',
				'description' => 'this is task3' ,
				'project_id' => '1',
				'card_id' => '1',
		         'date_created' => date("2017-03-2 H:i:s"),
		        'date_ended' => date("2017-05-24 H:i:s"),
		      
		            ],
		        ];
		DB::table('tasks')->insert($tasks);
	}
}
