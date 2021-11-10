<?php

namespace App\Models;

use App\Models\Translations\CourseCategoryTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class CourseCategory extends Model implements TranslatableContract
{
    use HasFactory , Translatable;

    public $translationModel = CourseCategoryTranslation::class;
   
    public $translatedAttributes = ['name','description'];

    protected $fillable = [
        'image_path',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}