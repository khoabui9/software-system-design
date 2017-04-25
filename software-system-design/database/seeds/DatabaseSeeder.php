<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	
	/**
	* Run the database seeds.
	     *
	     * @return void
	     */
	    public function run()
	    {
		$this->call(UsersTableSeeder::class);
		$this->call(ProjectsTableSeeder::class);
		$this->call(TasksTableSeeder::class);
		$this->call(UserProjectTableSeeder::class);
		$this->call(UserTaskTableSeeder::class);
		$this->call(ChatsTableSeeder::class);
		$this->call(UserChatTableSeeder::class);
		$this->call(MessagesTableSeeder::class);
	}
}
