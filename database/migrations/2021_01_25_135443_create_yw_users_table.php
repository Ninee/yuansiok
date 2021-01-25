<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYwUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yw_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('platform');
            $table->string('time');
            $table->string('open_id');
            $table->text('ua')->nullable();
            $table->string('ip');
            $table->string('appflag');
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
        Schema::dropIfExists('yw_users');
    }
}
