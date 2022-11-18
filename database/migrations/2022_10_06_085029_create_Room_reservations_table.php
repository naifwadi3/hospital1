<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRoomReservationsTable extends Migration {

	public function up()
	{
		Schema::create('Room_reservations', function(Blueprint $table) {
			$table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
			$table->string('Patient_id');
			$table->string('room_id');
			$table->date('booking_date');
			$table->date('Exit_date');
            $table->string('did_pay');
			// $table->string('facilities_name'); راح نحطهم بعدين
			// $table->string('facilities_phone');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Room_reservations');
	}
}
