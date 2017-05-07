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
        //
        DB::table('cards')->delete();
		$cards = [
		            [
		               'name' => 'TODO'
		            ],
		            [
		              'name' => 'In progress',
		            ],
		            [
		               'name' => 'Done',
		            ]
		        ];
		DB::table('cards')->insert($cards);
    }
}
