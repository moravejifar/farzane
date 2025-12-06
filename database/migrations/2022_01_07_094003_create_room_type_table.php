<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RoomType', function (Blueprint $table) {
            $table->increments('id')->index();
            // $table->string('id')->index();
            $table->string('room_name')->nullable();
            $table->string('max_quest')->nullable();
            $table->boolean('smoking')->nullable();
            $table->text('room_image')->nullable();
            $table->text('alt_image')->nullable();
            $table->string('room_size')->nullable();
            $table->text('description')->nullable();
            $table->float('room_priceusd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RoomType');
    }
}
