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
            $table->smallInteger('bed_room');
            $table->smallInteger('bath_room');
            $table->tinyInteger('is_tv')->default(0);
            $table->tinyInteger('is_kitchen')->default(0);
            $table->tinyInteger('is_air')->default(0);
            $table->tinyInteger('is_heating')->default(0);
            $table->tinyInteger('is_internet')->default(0);
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('verified')->default(0);

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
