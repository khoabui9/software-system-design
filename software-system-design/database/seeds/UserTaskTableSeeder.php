<?php

use Illuminate\Database\Seeder;

class UserTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('user_task')->delete();
          $tasks = [
		            [
		               'user_id' => 3,
				       'task_id' => 1
		            ],
		            [
		               'user_id' => 1,
				       'task_id' => 3
		            ],
		            [
		               'user_id' => 2,
				       'task_id' => 2
		            ]
		        ];
		DB::table('user_task')->insert($tasks);
    }
}
