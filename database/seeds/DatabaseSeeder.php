<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(IndeksRasioSeeder::class);
       $this->call(DatakriteriaSeeder::class);
       $this->call(AntarkriteriaSeeder::class);
       $this->call(UserSeeder::class);
    }
}
