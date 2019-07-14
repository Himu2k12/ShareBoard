<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeDislikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_dislikes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idea_id')->unsigned();
            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();
            $table->integer('user_id')->unsigned();

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
        Schema::dropIfExists('like_dislikes');
    }
}
