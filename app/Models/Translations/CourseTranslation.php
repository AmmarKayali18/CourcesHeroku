<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTranslation extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'locale',
    ];
}
