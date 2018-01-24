<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	['name' => 'Agnia Eva Munthafa', 'username' => 'agniaeva', 'email' => 'agniaeva@gmail.com', 'password' => '123456', 'hak_akses' => 'admin'],
        	['name' => 'Putri Tania', 'username' => 'putri01', 'email' => 'putritania@gmail.com', 'password' => '123456', 'hak_akses' => 'penilai']
        ]);
    }
}
