<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_product', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('sell_period');
            $table->integer('product_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('company_id')->references('id')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_product');
    }
};
