<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomStatusHistoryTable extends Migration
{
    public function up()
    {
        // Schema::create('room_status_history', function (Blueprint $table) {
        //     $table->id(); // این معادل $table->bigIncrements('id') است
        //     // $table->id('HistoryID'); // کلید اصلی خودکار
        //     $table->unsignedBigInteger('RoomID'); // شناسه اتاق
        //     $table->unsignedBigInteger('StatusID'); // شناسه وضعیت
        //     $table->dateTime('StartDateTime'); // شروع وضعیت
        //     $table->dateTime('EndDateTime')->nullable(); // پایان وضعیت (NULL = وضعیت فعلی)
        //     $table->string('UpdatedBy'); // کاربر تغییر دهنده
        //     $table->timestamps(); // created_at و updated_at خودکار

        //     // تعریف کلید خارجی (اختیاری، اگر جداول Room و RoomStatus وجود دارد)
        //     $table->foreign('RoomID')->references('id')->on('rooms')->onDelete('cascade');
        //     $table->foreign('StatusID')->references('id')->on('room_status')->onDelete('cascade');
        // });
Schema::create('room_status_history', function (Blueprint $table) {
        $table->id();

        // 👇 اصلاح شد: استفاده از unsignedInteger برای تطابق با 'rooms'
        $table->unsignedInteger('RoomID');

        // 👇 اصلاح شد: استفاده از unsignedInteger برای تطابق با 'room_status'
        $table->unsignedInteger('StatusID');

        $table->dateTime('StartDateTime');
        $table->dateTime('EndDateTime')->nullable();
        $table->string('UpdatedBy');
        $table->timestamps();

        // 👇 تعریف دستی کلید خارجی RoomID
        $table->foreign('RoomID')
              ->references('id') // فرض می کنیم کلید اصلی در rooms، 'id' است
              ->on('rooms')
              ->onDelete('cascade');

        // 👇 تعریف دستی کلید خارجی StatusID (همانطور که قبلا اصلاح کردیم)
        $table->foreign('StatusID')
              ->references('status_id')
              ->on('room_status')
              ->onDelete('cascade');
    });
    }

    public function down()
    {
        Schema::dropIfExists('room_status_history');
    }
}
