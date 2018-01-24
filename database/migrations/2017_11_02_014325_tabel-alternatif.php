<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelAlternatif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foto')->nullable();
            $table->string('nim');
            $table->string('nama_alternatif');
            $table->string('jk')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('semester')->nullable();
            $table->double('penghasilan_ortu')->nullable();
            $table->double('ipk')->nullable();
            $table->string('transkrip')->nullable();
            $table->string('kti')->nullable();
            $table->string('video')->nullable();
            $table->string('prestasi')->nullable();
            $table->string('dokpres')->nullable();
            $table->double('cek')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternatif');
    }
}
