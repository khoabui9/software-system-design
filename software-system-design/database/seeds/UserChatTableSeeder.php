<?php

use Illuminate\Database\Seeder;

class UserChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	DB::table('user_chat')->delete();
        $messages = [
		            [
		               'user_id' => 3,
				       'chat_id' => 1
		            ],
		            [
		               'user_id' => 1,
				       'chat_id' => 3
		            ],
		            [
		               'user_id' => 2,
				       'chat_id' => 2
		            ]
		        ];
		DB::table('user_chat')->insert($messages);
    }
}
