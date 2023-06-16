<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StudentParent extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name' , 'nationality' , 'blood' , 'national_ID' , 'religion'];

    protected $fillable = [
            'email' ,
            'password',
            'name',
            'nationality',
            'blood',
            'national_ID',
            'religion',
    ];

}
