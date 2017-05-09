<?php

use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
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
            ],
            [
                'name' => 'project2 chat',
            ],
            [
                'name' => 'project3 chat',
            ]
        ];

        DB::table('chats')->insert($chats);
    }
}
