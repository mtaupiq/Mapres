<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelHasil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_alternatif')->unsigned();
            $table->double('hasil_pedoman');
            $table->double('hasil_ahp');
            $table->timestamps();
        });

        Schema::table('hasil', function ($table) {
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
        Schema::table('hasil', function (Blueprint $table) {
            $table->dropForeign('hasil_id_alternatif_foreign');
        });
        
        Schema::dropIfExists('hasil');
    }
}
