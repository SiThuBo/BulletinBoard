<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->String('title');
            $table->text('description');
            $table->integer('post_status')->default(1);
            $table->integer('created_user_id')->unsigned();
            $table->foreign('created_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_user_id')->unsigned();
            $table->foreign('updated_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('deleted_user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at')->nullable();
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
