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
        Schema::create('demand_auctions', function (Blueprint $table) {
            $table->id('auction_id');
            $table->string('crop_name');
            $table->integer('starting_price');
            $table->integer('crop_volume');
            $table->integer('creator_id')->references('id')->on('users')->unsigned();
            $table->string('status');
            $table->timestamp('pick_up_date')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demand_auctions');
    }
};
