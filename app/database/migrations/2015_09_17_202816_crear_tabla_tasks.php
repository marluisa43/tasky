<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTasks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks',function($tabla){
			$tabla->increments('id');
			$tabla->string('tarea');
			$tabla->enum('estado',array('Pendiente','En proceso','Completada'))->default('Pendiente');
			$tabla->integer('user_id')->unsigned();
			$tabla->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
