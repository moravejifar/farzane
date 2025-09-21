<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->integer('room_id')->index();
            $table->integer('id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->foreign('id')->references('id')->on('room_type')->onDelete('cascade');
            $table->foreign('status_id')->references('status_id')->on('room_status')->onDelete('cascade');
            $table->string('room_number')->nullable();
            $table->string('floor_number')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
