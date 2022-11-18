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
        Schema::create('invoises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->bigInteger('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->string('patient_email');
            $table->string('patient_mobile');

            $table->string('invoice_number');
            $table->string('invoice_number2');
            $table->date('invoice_date');
            $table->decimal('sub_total', 8, 2)->default(0.00);
            $table->string('discount_type')->nullable();
            $table->decimal('discount_value', 8, 2)->default(0.00);
            $table->decimal('vat_value', 8, 2)->default(0.00);
            $table->decimal('shipping', 8, 2)->default(0.00);
            $table->decimal('total_due', 8, 2)->default(0.00);
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
        Schema::dropIfExists('invoises');
    }
};
