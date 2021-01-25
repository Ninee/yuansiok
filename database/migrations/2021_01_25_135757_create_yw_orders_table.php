<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYwOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yw_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_name');
            $table->string('amount');
            $table->string('order_id');
            $table->string('order_time');
            $table->string('pay_time');
            $table->string('openid');
            $table->string('user_name');
            $table->string('reg_time');
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
        Schema::dropIfExists('yw_orders');
    }
}
