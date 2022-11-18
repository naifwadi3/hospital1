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
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            // $table->bigInteger('patient_id')->unsigned();
            // $table->foreign('patient_id')->references('id')->on('patients');

			// $table->bigInteger('doctor_id')->unsigned();
            // $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->string('medicament_name');
            $table->string('medicament_id');
            $table->string('quantity');
            $table->string('producing_company');
            $table->string('made_in');
            $table->string('medicament_classification');
            $table->date('production_date');
            $table->date('expiry_date');
            $table->string('expire')->default(0);;
            $table->string('note');



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
        Schema::dropIfExists('pharmacies');
    }
};
