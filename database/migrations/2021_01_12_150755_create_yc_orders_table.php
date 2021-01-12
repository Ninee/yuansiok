<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYcOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yc_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->integer('money');
            $table->integer('status');
            $table->string('sid');
            $table->string('uid');
            $table->string('create_time')->nullable();
            $table->string('pay_time')->nullable();
            $table->string('book_name');
            $table->string('regsiter_time')->nullable();
            $table->string('ip');
            $table->string('ua')->nullable();
            $table->string('open_id')->nullable();
            $table->string('nickname')->nullable();
            $table->tinyInteger('is_back')->default(0);
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
        Schema::dropIfExists('yc_orders');
    }
}
