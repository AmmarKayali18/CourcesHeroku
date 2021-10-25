<?php

namespace App\Models;

use App\Models\Translations\ClassHallTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class ClassHall extends Model implements TranslatableContract
{
    use HasFactory , Translatable;

    public $translationModel = ClassHallTranslation::class;

    public $translatedAttributes = ['name'];
    

    protected $fillable = [
        'count_chairs',
    ];
}
