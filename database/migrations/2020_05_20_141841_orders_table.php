<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->unsignedBigInteger('user_id');
            $table->string('fio');
            $table->string('phone');
            $table->string('email');
            $table->string('delivery_address');
            $table->timestamp('delivery_time');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('orderpizzas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('original_pizza_id');
            $table->unsignedInteger('count');
            $table->string('name');
            $table->string('image');
            $table->float('price');
            $table->string('size');
            $table->string('weight');
            $table->string('short_description');
            $table->boolean('is_spicy');
            $table->boolean('is_popular');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('original_pizza_id')->references('id')->on('pizzas');
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
        $table->dropForeign('orders_user_id_foreign');

        Schema::dropIfExists('orderpizzas');
        $table->dropForeign('orderpizzas_user_id_foreign');
    }
}
