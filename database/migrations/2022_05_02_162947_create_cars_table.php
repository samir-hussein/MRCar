<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('mark');
            $table->string('model');
            $table->string('year');
            $table->string('img');
            $table->string('desc');
            $table->string('color');
            $table->string('tirm');
            $table->string('interior');
            $table->string('body');
            $table->string('transmission');
            $table->string('price');
            $table->unsignedBigInteger('seller_id');
            $table->string('approved')->default('no');
            $table->string('views')->default('0');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('cars');
    }
}
