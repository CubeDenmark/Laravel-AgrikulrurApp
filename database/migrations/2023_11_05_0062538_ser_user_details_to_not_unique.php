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
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['name']);
            $table->dropUnique(['address']);
            $table->dropUnique(['val_img']);
            $table->dropUnique(['profile_img']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unique(['name']);
            $table->unique(['address']);
            $table->unique(['val_img']);
            $table->unique(['profile_img']);
        });
    }
};
