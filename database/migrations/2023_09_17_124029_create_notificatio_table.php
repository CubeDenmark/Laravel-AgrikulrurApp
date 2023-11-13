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
        Schema::create('notificatio', function (Blueprint $table) {
            $table->id('notif_id');
            $table->integer('auction_id')->references('auction_id')->on('auctions')->unsigned();
            $table->string('crop_id');
            $table->integer('creator_id')->references('id')->on('users')->unsigned();
            $table->integer('bidder_id')->references('id')->on('users')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
