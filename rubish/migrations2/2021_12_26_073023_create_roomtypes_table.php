<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomtypes', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->index();
            $table->string('roomtype',100)->nullable();
            $table->string('rooming',100)->nullable();
            $table->text('description')->nullable();
            $table->float('cost',10,2)->nullable();
            $table->boolean('status')->default(true);
            $table->string('image')->nullable();
            $table->string('alt_image')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roomtypes');
    }
}
