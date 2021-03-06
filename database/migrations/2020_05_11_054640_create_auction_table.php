<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction', function (Blueprint $table) {
            $table->bigIncrements('auction_num')->unique();
            //$table->primary('auction_num');
            /*$table->integer('auction_itemnum');*/
            $table->string('buyer_ID');
            $table->integer('item_price')->nulluble();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('auction', function (Blueprint $table) {
          $table->unsignedBigInteger('auction_itemnum')->index();
          $table->foreign('auction_itemnum')->references('item_number')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auction');
    }
}
