<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->bigIncrements('id_booking');
            $table->string('name_booking');
            $table->integer('phone_booking');
            $table->string('image_booking');
            $table->string('email_booking');
            $table->integer('id_user');
            $table->string('time_booking');
            $table->string('description_booking');
            $table->integer('status_booking');
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
        Schema::dropIfExists('booking');
    }
}
