<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("full_name")->nullable();

            $table->bigInteger("user_id")->unsigned()->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->longText("street")->nullable();
            $table->bigInteger("address_id")->unsigned();//
            $table->foreign("address_id")->references("id")->on("addresses")->onDelete("cascade");

            $table->bigInteger("status_id")->unsigned()->default(1);//
            $table->foreign("status_id")->references("id")->on("transaction_statuses")->onDelete("cascade");

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
        Schema::dropIfExists('transactions');
    }
}
