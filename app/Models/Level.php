<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Section ;


class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'section_id',

    ] ;

    public function Section ():BelongsTo {
        return $this->BelongsTo(Section::class , 'section_id');
    }
}
