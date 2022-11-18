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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('patient_name');
			$table->string('patient_id');
			$table->string('patient_phone');
			$table->string('patient_blood_type');
			$table->string('patient_religion');
			$table->string('patient_gender');
			$table->string('patient_allergy');
			$table->date('patient_birthday');
			$table->date('patient_arrival_time');
			$table->string('reason_for_visit');

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
        Schema::dropIfExists('patients');
    }
};
