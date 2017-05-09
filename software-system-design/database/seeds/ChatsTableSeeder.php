<?php

use Illuminate\Database\Seeder;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chats')->delete();
		$chats = [
            [
                'name' => 'project1 chat',
                'project_id' => 1
            ],
            [
                'name' => 'project2 chat',
                'project_id' => 2
            ],
            [
                'name' => 'project3 chat',
                'project_id' => 3
            ]
        ];
        DB::table('chats')->insert($chats);	
    }
}
