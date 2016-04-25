<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSquadTable extends Migration
{
	public function up()
	{
		Schema::create('squad', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('nickname');
			$table->string('name');
			$table->string('email');
			$table->string('web');
			$table->string('picture');
			$table->string('title');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('squad_member', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('squad_id')->unsigned();
			$table->foreign('squad_id')->references('id')->on('squad')->onUpdate('cascade')->onDelete('cascade');
			$table->string('player_id');
			$table->string('nickname');
			$table->string('name');
			$table->string('email');
			$table->string('icq');
			$table->string('remark');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('user_has_squad', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('squad_id')->unsigned();
			$table->foreign('squad_id')->references('id')->on('squad')->onUpdate('cascade')->onDelete('cascade');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::dropIfExists('user_has_squad');
		Schema::dropIfExists('squad_member');
		Schema::dropIfExists('squad');
	}
}