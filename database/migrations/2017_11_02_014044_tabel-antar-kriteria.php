<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelAntarKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antar_kriteria', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kpertama')->unsigned();
            $table->integer('id_kkedua')->unsigned();
            $table->double('bobot');
            $table->double('total_pembanding');
            $table->double('normalisasi');
            $table->timestamps();
        });

        Schema::table('antar_kriteria', function ($table) {
            $table->foreign('id_kpertama')
                ->references('id')
                ->on('data_kriteria')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('antar_kriteria', function ($table) {
            $table->foreign('id_kkedua')
                ->references('id')
                ->on('data_kriteria')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('antar_kriteria', function(Blueprint $table) {
            $table->dropForeign('antar_kriteria_id_kpertama_foreign');
        });

        Schema::table('antar_kriteria', function(Blueprint $table) {
            $table->dropForeign('antar_kriteria_id_kkedua_foreign');
        });
        
        Schema::dropIfExists('antar_kriteria');
    }
}
