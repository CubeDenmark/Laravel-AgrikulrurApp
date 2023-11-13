<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demand_bids', function (Blueprint $table) {
            $table->id('bid_id');
            $table->integer('bid_amount');
            $table->integer('bidder_id')->references('id')->on('users')->unsigned();
            $table->integer('auction_id')->references('auction_id')->on('auctions')->unsigned();
            $table->string('crop_name');
            $table->string('on_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demand_bids');
    }
};
