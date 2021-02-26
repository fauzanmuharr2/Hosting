<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasusids', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_rw');
            $table->foreign('id_rw')->references('id')->on('rws')->onDelete('cascade');
            $table->integer('jumlah_positif');
            $table->integer('jumlah_meninggal');
            $table->integer('jumlah_sembuh');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *4
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasusids');
    }
}
