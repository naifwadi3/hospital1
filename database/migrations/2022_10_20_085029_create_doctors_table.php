<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration {

	public function up()
	{
		Schema::create('doctors', function(Blueprint $table) {
			$table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
			$table->string('name');
			$table->string('doctor_id');
			$table->string('email');
            $table->string('password');
			$table->string('doctor_phone');
			$table->string('doctor_gender');
			$table->date('doctor_birthday');
			$table->date('Date_of_contract');
			$table->date('Contract_expiry_date')->nullable();
			$table->bigInteger('doctor_specialty')->unsigned();
            $table->foreign('doctor_specialty')->references('id')->on('Specialties_doctor');
			$table->string('note');
            $table->string('photos');
            $table->string('cv');

			// $table->bigInteger('doctor_cv_file')->unsigned();
            // $table->foreign('doctor_cv_file')->references('id')->on('images');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('doctors');
	}
}
