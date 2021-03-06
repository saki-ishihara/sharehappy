<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seller_item_id')->unsigned()->index();
            $table->integer('buyer_item_id')->unsigned()->index();
            $table->string('status');
            $table->timestamps();
            
            $table->foreign('seller_item_id')->references('id')->on('user_item');
            $table->foreign('buyer_item_id')->references('id')->on('user_item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trades');
    }
}
