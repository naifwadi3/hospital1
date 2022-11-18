<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionTable extends Migration {

	public function up()
	{
		Schema::create('section', function(Blueprint $table) {
			$table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
			$table->string('note');

			$table->string('section_name');
			$table->string('section_number');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('section');
	}
}
