<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->integer('codigo_usuario');
			$table->primary('codigo_usuario');//se setea esta columna como primary key
			$table->integer('codigo_empresa');
			$table->string('nombre',200);
			$table->string('e_mail',65);
			$table->string('usuario',50);
			$table->string('password',60);
			$table->boolean('crea_contenido')->default(true);
			$table->boolean('activo')->default(true);
			$table->boolean('restablece_psw')->default(false);
			$table->rememberToken();
		});
		Schema::table('usuario', function(Blueprint $table)
		{
			$table->foreign('codigo_empresa')->references('codigo_empresa')->on('empresas')->onDelete('no action')->onUpdate('no action');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuario');
	}

}
