<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique() ;
            $table->string('password') ;

            // father info
            $table->string('father_name');
            $table->foreignId('father_nationality')->constrained('nationalities') ;
            $table->string('father_national_ID');
            $table->foreignId('father_religion')->constrained('religions') ;
            $table->foreignId('father_blood')->constrained('bloods') ;
            $table->string('father_address');
            $table->string('father_job');

            // mother info
            $table->string('mother_name');
            $table->foreignId('mother_nationality')->constrained('nationalities') ;
            $table->string('mother_national_ID');
            $table->foreignId('mother_religion')->constrained('religions') ;
            $table->foreignId('mother_blood')->constrained('bloods') ;
            $table->string('mother_address');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_parents');
    }
};
