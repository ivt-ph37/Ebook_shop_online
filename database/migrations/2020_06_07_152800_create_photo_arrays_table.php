<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoArraysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_arrays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('photo');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade");
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
        Schema::dropIfExists('photo_arrays');
    }
}
