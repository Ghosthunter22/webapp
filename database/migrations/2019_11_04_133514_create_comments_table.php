<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('post_id');
            $table->timestamps();

            //User ID Foreign Key
            $table->foreign('user_id')->references('id')->
            on('users')->onDelete('cascade')->
            onUpdate('cascade');
            //Post ID Foreign Key
            $table->foreign('post_id')->references('id')->
            on('posts')->onDelete('cascade')->
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
        Schema::dropIfExists('comments');
    }
}
