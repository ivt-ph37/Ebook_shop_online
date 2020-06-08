<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('photo');
            $table->text('description');
            $table->integer("amount");
            $table->double("price");
            $table->double("discount");
            $table->longText("information");

            $table->bigInteger("category_id")->unsigned();
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");

            $table->bigInteger("producer_id")->unsigned();
            $table->foreign("producer_id")->references("id")->on("producers")->onDelete("cascade");

            $table->bigInteger("status_id")->unsigned();
            $table->foreign("status_id")->references("id")->on("product_statuses")->onDelete("cascade");

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
        Schema::dropIfExists('products');
    }
}
