<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('Sections', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('name');
			$table->string('notes', 200)->nullable();
			$table->softDeletes() ;

		});
	}

	public function down()
	{
		Schema::drop('Sections');
	}
}