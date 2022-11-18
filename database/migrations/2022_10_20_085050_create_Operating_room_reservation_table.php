<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOperatingRoomReservationTable extends Migration {

	public function up()
	{
		Schema::create('Operating_room_reservation', function(Blueprint $table) {
			$table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            ///اضافة مريض

			$table->bigInteger('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->string('facilities_name');
            $table->string('facilities_phone');
            $table->string('operating_room_number');
            $table->string('recovery_room_number');
			$table->date('booking_date');
			$table->date('enter_time');
			$table->date('out_time');

			$table->string('Operation_type');

			// $table->bigInteger('Operating_room')->unsigned();
            // $table->foreign('Operating_room')->references('id')->on('room');


            ///اضافة اطباء

            $table->string('doctor_of_out');

			$table->bigInteger('doctor_id_1')->unsigned();
            $table->foreign('doctor_id_1')->references('id')->on('doctors');

			$table->bigInteger('doctor_id_2')->unsigned();
            $table->foreign('doctor_id_2')->references('id')->on('doctors');

			$table->bigInteger('doctor_id_3')->unsigned();
            $table->foreign('doctor_id_3')->references('id')->on('doctors');

			$table->bigInteger('doctor_id_4')->unsigned();
            $table->foreign('doctor_id_4')->references('id')->on('doctors');

            ///اضافة ممرضين

			$table->bigInteger('nurss_name_1')->unsigned();
            $table->foreign('nurss_name_1')->references('id')->on('nurs');

			$table->bigInteger('nurss_name_2')->unsigned();
            $table->foreign('nurss_name_2')->references('id')->on('nurs');

			$table->bigInteger('nurss_name_3')->unsigned();
            $table->foreign('nurss_name_3')->references('id')->on('nurs');

			$table->bigInteger('nurss_name_4')->unsigned();
            $table->foreign('nurss_name_4')->references('id')->on('nurs');












			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Operating_room_reservation');
	}
}
