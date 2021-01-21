<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZdOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zd_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('orderno');
            $table->integer('amount');
            $table->string('status');
            $table->string('openid');
            $table->string('regtime');
            $table->string('ip');
            $table->text('ua');
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
        Schema::dropIfExists('zd_orders');
    }
}
