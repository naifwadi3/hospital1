<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
			$table->string('name');
			$table->string('nurs_id');
			$table->string('email');
			$table->string('password');
			$table->string('nurs_age');
			$table->string('nurs_phone');
			$table->string('nurs_gender');
			$table->date('nurs_birthday');
			$table->date('Date_of_contract');
			$table->date('Contract_expiry_date')->nullable();
			$table->bigInteger('nurs_specialty')->unsigned();
            $table->foreign('nurs_specialty')->references('id')->on('Specialties_doctor');
			$table->string('note');
			$table->string('nurs_cv_file');
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
        Schema::dropIfExists('nurs');
    }
};
