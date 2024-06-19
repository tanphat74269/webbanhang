<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('comments');
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('com_id');
            $table->string('content');
            $table->integer('com_user')->unsigned();
            $table->integer('com_prod')->unsigned();

            $table->foreign('com_user')
                  ->references('id')
                  ->on('web_users')
                  ->onDelete('cascade');

            $table->foreign('com_prod')
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
        Schema::dropIfExists('comments');
    }
}
