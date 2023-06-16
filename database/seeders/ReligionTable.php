<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Religion ;


class ReligionTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('religions')->delete();
        
        $Religion = [
            [
                'en' => 'Muslim' ,
                'ar' => 'مسلم' ,
            ],
            [
                'en' => 'Christian' ,
                'ar' => 'مسيحى' ,
            ],
         ];

         foreach($Religion as $r) {
            Religion::create(['name' => $r]) ;
         }


    }
}
