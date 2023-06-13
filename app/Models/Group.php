<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Group extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    
    protected $fillable = [
        'name' ,
        'status',
        'sectionID',
        'levelID',
    ];

    public function Section () {
        return $this->BelongsTo(Section::class , 'sectionID') ;
    }

    public function Level () {
        return $this->BelongsTo(Level::class , 'levelID') ;
    }
}
