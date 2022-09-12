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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fisrt_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['enabled', 'disabled'])->default('enabled');
            $table->boolean('admin')->default(false);
            $table->integer('company_id')->unsigned()->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('user');
    }
};
