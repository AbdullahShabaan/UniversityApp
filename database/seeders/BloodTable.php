<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Blood ;

class BloodTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bloods')->delete() ;
        $blood_Type = ['O-' , 'O+' , 'A+' , 'A-' , 'B+' , 'B-' , 'AB+' , 'AB-'] ;

            foreach($blood_Type as $blood) {
              Blood::create(['name' => $blood]) ;
         }
    }
}
