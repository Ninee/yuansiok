<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wy_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('platform');
            $table->string('appflag')->nullable();
            $table->string('open_id');
            $table->string('order_id');
            $table->string('order_time');
            $table->string('amount');
            $table->string('wx_openid');
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
        Schema::dropIfExists('wy_orders');
    }
}
