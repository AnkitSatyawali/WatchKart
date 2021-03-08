<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('orders')) return;
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('subtotal');
            $table->integer('total');
            $table->integer('customer_address_id');
            $table->string('status')->default('processing');
            $table->string('paymentType');
            $table->timestamps();
        });
        Schema::create('order_products', function (Blueprint $table) {
            $table->integer('products_id');
            $table->integer('order_id');
            $table->string('products_name');
            $table->integer('products_quantity');
            $table->integer('products_cost');
            $table->primary(['products_id','order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_products');
    }
}
