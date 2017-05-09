<?php

use Illuminate\Database\Seeder;

class UserProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_project')->delete();
        $projects = [
		            [
		               'user_id' => 3,
				       'project_id' => 1
		            ],
		            [
		               'user_id' => 1,
				       'project_id' => 3
		            ],
					[
		               'user_id' => 1,
				       'project_id' => 2
		            ],
		            [
		               'user_id' => 2,
				       'project_id' => 2
		            ]
		        ];
		DB::table('user_project')->insert($projects);
    }
}
