<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        if(Schema::hasTable('carts')) return;
        Schema::create('carts', function (Blueprint $table) {
            // $table->increments('id');
            $table->integer('quantity')->default(1);
            $table->text('name');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('cost');
            $table->primary(['product_id','user_id']);
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
        Schema::dropIfExists('carts');
    }
}
