<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelNilaiEigen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_eigen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kriteria')->unsigned();
            $table->double('nilai');
            $table->timestamps();
        });

        Schema::table('nilai_eigen', function ($table) {
            $table->foreign('id_kriteria')
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
        Schema::table('nilai_eigen', function (Blueprint $table) {
            $table->dropForeign('nilai_eigen_id_kriteria_foreign');
        });
        Schema::dropIfExists('nilai_eigen');
    }
}
