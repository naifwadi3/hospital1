<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtiesDoctorTable extends Migration {

	public function up()
	{
		Schema::create('Specialties_doctor', function(Blueprint $table) {
			$table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
			$table->string('Specialties_name');
            $table->string('Specialties_number');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Specialties_doctor');
	}
}
