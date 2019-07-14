<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idea_title',200);
            $table->text('idea_description');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('file_data')->nullable();
            $table->date('closer_date')->nullable();
            $table->tinyInteger('anonymous_post');
            $table->tinyInteger('publication_status')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');


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
        Schema::dropIfExists('ideas');
    }
}
