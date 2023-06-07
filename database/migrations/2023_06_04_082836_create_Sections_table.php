<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('Sections', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 99);
			$table->string('notes', 200)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Sections');
	}
}