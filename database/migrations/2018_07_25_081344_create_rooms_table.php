<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->float('price');
            $table->text('summary');
            $table->text('rule');
            $table->smallInteger('bed_room');
            $table->smallInteger('bath_room');
            $table->tinyInteger('is_tv');
            $table->tinyInteger('is_air');
            $table->tinyInteger('is_internet');
            $table->tinyInteger('is_phone');
            $table->tinyInteger('is_kitchen');

            $table->tinyInteger('active');
            $table->tinyInteger('verified');

            // references
            $table->integer('room_type')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->timestamps();
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
