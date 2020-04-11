<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name', 255);
            $table->string('item', 255);
            $table->integer('amount')->nullable();
            $table->integer('ini_year')->nullable();
            $table->string('provider_name', 255)->nullable();
            $table->string('zipcode', 10)->nullable();
            $table->string('street', 255)->nullable();
            $table->string('district', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('ibge', 255)->nullable();            
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
        Schema::dropIfExists('properties');
    }
}
