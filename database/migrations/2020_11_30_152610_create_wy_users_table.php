<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wy_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('platform')->nullable();
            $table->string('appflag')->nullable();
            $table->string('open_id');
            $table->string('reg_time');
            $table->text('ua');
            $table->string('ip');
            $table->string('wx_openid')->nullable();
            $table->integer('is_back')->default(0);
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
        Schema::dropIfExists('wy_users');
    }
}
