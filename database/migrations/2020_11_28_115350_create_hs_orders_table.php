<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('user_name');
            $table->string('openid');
            $table->string('subscribe_at');
            $table->string('join_at');
            $table->string('amount');
            $table->integer('charge_count');
            $table->string('book_name');
            $table->string('spread_id');
            $table->string('spread_name');
            $table->string('spread_link');
            $table->string('order_num');
            $table->string('trans_id');
            $table->string('pay_at');
            $table->string('request_at');
            $table->integer('order_status');
            $table->string('ip');
            $table->text('ua');
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
        Schema::dropIfExists('hs_orders');
    }
}
