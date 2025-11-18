<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_images', function (Blueprint $table) {
            $table->id(); // Image_ID

            // 👇 اصلاح شد: استفاده از unsignedInteger برای تطابق با کلید اصلی INT در جدول room_type
            $table->unsignedInteger('room_type_id');

            $table->string('image_url');
            $table->string('caption')->nullable();
            $table->integer('image_order')->default(99);
            $table->boolean('is_main')->default(false);

            $table->timestamps();

            // 👇 تعریف دستی کلید خارجی
            $table->foreign('room_type_id')
                  ->references('id')
                  ->on('room_type')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_images');
    }
}
