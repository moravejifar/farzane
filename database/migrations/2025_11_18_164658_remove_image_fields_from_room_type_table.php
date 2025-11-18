<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveImageFieldsFromRoomTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_type', function (Blueprint $table) {
            // 👇 نام فیلدهای شما: room_image و alt_image
            $table->dropColumn('room_image');
            $table->dropColumn('alt_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            //
            Schema::table('room_type', function (Blueprint $table) {
            // 👇 برگرداندن فیلدهای حذف شده
            $table->text('room_image')->nullable();
            $table->text('alt_image')->nullable();
        });

    }
}
