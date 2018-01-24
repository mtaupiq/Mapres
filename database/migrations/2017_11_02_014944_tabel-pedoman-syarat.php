<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelPedomanSyarat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prosedur', function (Blueprint $table) {
            $table->increments('id');
            $table->text('informasi');
            $table->timestamps();
        });

        Schema::create('syarat', function (Blueprint $table) {
            $table->increments('id');
            $table->text('info');
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
        Schema::dropIfExists('prosedur');
        Schema::dropIfExists('syarat');
    }
}
