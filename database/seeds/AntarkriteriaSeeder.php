<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AntarkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('antar_kriteria')->insert([
    		['id_kpertama' => 1, 'bobot' => 1, 'id_kkedua' => 1],
    		['id_kpertama' => 1, 'bobot' => 1, 'id_kkedua' => 2],
    		['id_kpertama' => 1, 'bobot' => 1, 'id_kkedua' => 3],
    		['id_kpertama' => 1, 'bobot' => 1, 'id_kkedua' => 4],
    		['id_kpertama' => 2, 'bobot' => 1, 'id_kkedua' => 1],
    		['id_kpertama' => 2, 'bobot' => 1, 'id_kkedua' => 2],
    		['id_kpertama' => 2, 'bobot' => 1, 'id_kkedua' => 3],
    		['id_kpertama' => 2, 'bobot' => 1, 'id_kkedua' => 4],
    		['id_kpertama' => 3, 'bobot' => 1, 'id_kkedua' => 1],
    		['id_kpertama' => 3, 'bobot' => 1, 'id_kkedua' => 2],
    		['id_kpertama' => 3, 'bobot' => 1, 'id_kkedua' => 3],
    		['id_kpertama' => 3, 'bobot' => 1, 'id_kkedua' => 4],
    		['id_kpertama' => 4, 'bobot' => 1, 'id_kkedua' => 1],
    		['id_kpertama' => 4, 'bobot' => 1, 'id_kkedua' => 2],
    		['id_kpertama' => 4, 'bobot' => 1, 'id_kkedua' => 3],
    		['id_kpertama' => 4, 'bobot' => 1, 'id_kkedua' => 4]
    	]);
    }
}
