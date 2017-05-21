<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
	
	/**
	* Run the database seeds.
	     *
	     * @return void
	     */
	    public function run()
	    {
		DB::table('messages')->delete();
		$messages = [
		            [
		                'content' => 'project1 hi',
		                'user_id' => 3,
						'chat_id' => 1,
    			        'created_at' => date("2017-3-2 H:i:s"),

		            ],
		            [
		                'content' => 'project2 hi',
		                'user_id' => 1,
						'chat_id' => 3,
						'created_at' => date("2017-3-2 H:i:s"),

		            ],
		            [
		                'content' => 'project3 hi',
		                'user_id' => 2,
						'chat_id' => 2,
						'created_at' => date("2017-3-2 H:i:s"),

		            ] 
		        ];
		DB::table('messages')->insert($messages);
	}
}
