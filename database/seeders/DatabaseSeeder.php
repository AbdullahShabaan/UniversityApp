<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeders\BloodTable ;
use Database\Seeders\nationalitiesTable ;
use Database\Seeders\ReligionTable ;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		$this->call(BloodTable::class) ;
		$this->call(nationalitiesTable::class) ;
		$this->call(ReligionTable::class) ;
	}
}