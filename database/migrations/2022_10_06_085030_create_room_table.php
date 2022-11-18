<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTable extends Migration {

	public function up()
	{
		Schema::create('room', function(Blueprint $table) {
			$table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('room_name');
			$table->string('room_id');
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('section');
			$table->string('Special_room');
			$table->string('room_price');
			$table->string('room_type');
			$table->string('note');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('room');
	}
}
