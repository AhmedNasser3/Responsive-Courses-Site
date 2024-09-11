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
        Schema::table('sub_sub_categories', function (Blueprint $table) {
            $table->boolean('is_visible')->default(1);
            $table->unsignedBigInteger('users_id')->nullable(); // إضافة العمود user_id
            $table->unsignedBigInteger('user_id')->nullable(); // إضافة العمود user_id

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_sub_categories', function (Blueprint $table) {
            $table->dropColumn('is_visible');
        });
    }
};
