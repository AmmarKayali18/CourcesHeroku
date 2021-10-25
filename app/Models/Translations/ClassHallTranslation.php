<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassHallTranslation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'class_hall_id',
        'name',
        'locale',
    ];
}
