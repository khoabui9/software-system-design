<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
	
	/**
	* Run the database seeds.
	     *
	     * @return void
	     */
	    public function run()
	    {
		//
		DB::table('projects')->delete();
		$projects = [
            [
                'name' => 'project1',
                'description' => 'this is project1' 
                
            ],
            [
                'name' => 'project2',
                'description' => 'this is project2' 
                
            ],
            [
                'name' => 'project3',
                'description' => 'this is project3' 
                
            ]
        ];

        DB::table('projects')->insert($projects);
		
	}
}
