<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('comment_num')->unique();
            $table->date('time');
            $table->string('comments');
            $table->timestamps();
            $table->rememberToken();
        });
        Schema::table('comment', function (Blueprint $table){
          $table->string('comment_id')->index();
          $table->foreign('comment_id')->references('id')->on('users');

          $table->unsignedBigInteger('comm_item')->index();
          $table->foreign('comm_item')->references('item_number')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
