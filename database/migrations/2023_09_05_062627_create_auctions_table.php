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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id('auction_id');
            $table->integer('crop_id')->references('crop_id')->on('crops')->unsigned();
            $table->integer('starting_price');
            $table->integer('crop_volume');
            $table->integer('user_id')->references('id')->on('users')->unsigned();
            $table->string('status');
            $table->timestamp('end_time')->nullable();
            $table->string('auctionCropImage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
