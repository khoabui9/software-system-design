<?php

use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_role')->delete();
		$roles = [
		            [
		               'role' => 'user'
		            ],
		            [
		              'role' => 'admin',
		            ],
		        ];
		DB::table('user_role')->insert($roles);
    }
}
