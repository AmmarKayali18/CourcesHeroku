<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategoryTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_category_id',
        'name',
        'description',
        'locale',
    ];
}
