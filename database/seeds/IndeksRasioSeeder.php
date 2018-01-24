<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class IndeksRasioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('indeks_rasio')->insert([
		    ['n' => '1','nilai' => 0.00],
		    ['n' => '2','nilai' => 0.00],
		    ['n' => '3','nilai' => 0.58],
		    ['n' => '4','nilai' => 0.90],
		    ['n' => '5','nilai' => 1.12],
		    ['n' => '6','nilai' => 1.24],
		    ['n' => '7','nilai' => 1.32],
		    ['n' => '8','nilai' => 1.41],
		    ['n' => '9','nilai' => 1.45],
		    ['n' => '10','nilai' => 1.49],
		    ['n' => '11','nilai' => 1.51],
		    ['n' => '12','nilai' => 1.48],
		    ['n' => '13','nilai' => 1.56],
		    ['n' => '14','nilai' => 1.57],
		    ['n' => '15','nilai' => 1.59]
		]);
    }
}
