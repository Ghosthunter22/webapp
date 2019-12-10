<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfpicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profpics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->default('default.jpg');
            $table->unsignedInteger('basic_user_id');
            $table->timestamps();

            $table->foreign('basic_user_id')->references('id')->
            on('basic_users')->onDelete('cascade')->
            onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profpics');
    }
}
