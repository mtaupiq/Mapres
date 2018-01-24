<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelNilaiReal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_real', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_alternatif')->unsigned();
            $table->double('nilai_k1');
            $table->double('nilai_k2');
            $table->double('nilai_k3');
            $table->double('nilai_k4');
            $table->timestamps();
        });

        Schema::table('nilai_real', function (Blueprint $table) {
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
        Schema::table('nilai_real', function (Blueprint $table) {
            $table->dropForeign('nilai_real_id_alternatif_foreign');
        });
        
        Schema::dropIfExists('nilai_real');
    }
}
