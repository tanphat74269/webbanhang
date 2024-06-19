<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('orders');
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('quantity');

            $table->integer('order_user')->unsigned();
            $table->integer('order_product')->unsigned();

            $table->foreign('order_user')
                  ->references('id')
                  ->on('web_users')
                  ->onDelete('cascade');

            $table->foreign('order_product')
                  ->references('prod_id')
                  ->on('products')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
