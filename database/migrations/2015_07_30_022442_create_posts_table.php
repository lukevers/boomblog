<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('meta_description');
            $table->text('body');
            $table->integer('user')->unsigned();
            $table->timestamps();

            $table->foreign('user')->references('id')->on('users');
        });

        Schema::create('tags', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('post_tags', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('tag')->unsigned();
            $table->integer('post')->unsigned();

            $table->foreign('tag')->references('id')->on('tags');
            $table->foreign('post')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_tags');
        Schema::drop('tags');
        Schema::drop('posts');
    }
}
