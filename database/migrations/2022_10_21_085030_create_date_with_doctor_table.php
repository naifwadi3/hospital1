<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateWithDoctorTable extends Migration {

	public function up()
	{
		Schema::create('date_with_doctor', function(Blueprint $table) {
			$table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
			$table->bigInteger('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->bigInteger('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors');

			$table->string('visit_date');
            $table->string('patient_phone');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('date_with_doctor');
	}
}
