<?php

namespace App\Models;

use App\Models\Translations\EquipmentTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Equipment extends Model implements TranslatableContract
{
    use HasFactory,Translatable;
    public $table = "equipments";
    public $translationModel = EquipmentTranslation::class;

    public $translatedAttributes = ['name','description'];

    protected $fillable = [
        'count',
        'temporary_count',
        'broken_count',
        'image_path',
    ];
}
