<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('room_status', function (Blueprint $table) {
            // فیلد رنگ - اختیاری (nullable)
            $table->string('ColorCode', 10)->nullable()->after('status_name');

            // فیلد فعال/غیرفعال - نوع بولین (معادل BIT در MySQL)
            $table->boolean('IsActive')->default(true)->after('ColorCode');
        });
    }

    public function down(): void
    {
        Schema::table('room_status', function (Blueprint $table) {
            $table->dropColumn(['ColorCode', 'IsActive']);
        });
    }
};
