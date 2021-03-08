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
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('image1');
            $table->string('image2');
            $table->integer('quantity');
            $table->timestamp('launchDate');
            $table->text('brand');
            $table->text('occassion');
            $table->integer('rating');
            $table->integer('cost');
            $table->integer('discount');
            $table->boolean('isWaterResistant');
            $table->string('display');
            $table->string('warratyPeriod');
            // $table->timestamps(); 
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
