<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatakriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_kriteria')->insert([
        	['nama_kriteria' => 'IPK','persentase_kriteria'=>20],
        	['nama_kriteria' => 'KTI','persentase_kriteria'=>30],
        	['nama_kriteria' => 'Bahasa Inggris','persentase_kriteria'=>25],
        	['nama_kriteria' => 'Prestasi','persentase_kriteria'=>25]
        ]);
    }
}
