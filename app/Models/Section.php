<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name' ,
        'note',
    ];

    
    public $translatable = ['name'];


    public function groups () {
        return $this->hasMany(Group::class , 'sectionID') ;
    }
}
