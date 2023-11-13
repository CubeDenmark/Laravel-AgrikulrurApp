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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();// make it fullname to become unique
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone', 11);
            $table->string('address')->unique();
            $table->boolean('type')->default(false); //add type boolean Users: 0=>User, 1=>Admin, 2=>Manager 
            //$table->string('user_type', 2);             //add type boolean Users: 0=>Farmer, 1=>Bidder, 2=>Admin 
            //$table->boolean('status')->default(false);
            $table->string('status', '1');
            $table->string('val_img')->unique();
            $table->string('profile_img')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
