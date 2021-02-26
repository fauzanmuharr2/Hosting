<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusgbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasusgbs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_negara');
            $table->foreign('id_negara')->references('id')->on('negaras')->onDelete('cascade');
            $table->integer('total_positif');
            $table->integer('total_sembuh');
            $table->integer('total_meninggal');
            $table->date('tanggal');
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
        Schema::dropIfExists('kasusgbs');
    }
}
