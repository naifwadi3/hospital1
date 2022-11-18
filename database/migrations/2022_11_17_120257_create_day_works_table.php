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
        Schema::create('day_works', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('worker_id')->unsigned();
            $table->foreign('worker_id')->references('id')->on('doctors')->or('nurs');

            $table->string('the_work');
            $table->string('status');
            $table->date('start_time');
            $table->date('end_time');
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
        Schema::dropIfExists('day_works');
    }
};
