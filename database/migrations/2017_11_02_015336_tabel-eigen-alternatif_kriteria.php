<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelEigenAlternatifKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif_kriteria', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_alternatif')->unsigned();
            $table->double('al_k1');
            $table->double('al_k2');
            $table->double('al_k3');
            $table->double('al_k4');
            $table->timestamps();
        });

        Schema::table('alternatif_kriteria', function ($table) {
            $table->foreign('id_alternatif')
                ->references('id')
                ->on('alternatif')
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
        Schema::table('alternatif_kriteria', function(Blueprint $table) {
            $table->dropForeign('alternatif_kriteria_id_alternatif_foreign');
        });
        
        Schema::dropIfExists('alternatif_kriteria');
    }
}
