<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZdUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zd_users', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('isfollow');
            $table->string('openid');
            $table->string('regtime');
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
        Schema::dropIfExists('zd_users');
    }
}
