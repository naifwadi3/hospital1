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
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->foreignId('invoice_id')->constrained('invoises')->onDelete('cascade');
            $table->foreignId('product_name')->constrained('fees')->onDelete('cascade');

            $table->string('unit');
            $table->decimal('quantity', 8,2)->default(0.00);
            $table->decimal('unit_price', 8,2)->default(0.00);
            $table->decimal('row_sub_total', 8,2)->default(0.00);
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
        Schema::dropIfExists('invoice_details');
    }
};
