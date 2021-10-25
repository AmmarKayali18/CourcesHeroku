<?php

namespace App\Models;

use App\Models\Translations\CourseTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Course extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    public $translationModel = CourseTranslation::class;
  
    public $translatedAttributes = ['title','description'];

    protected $fillable = [
        'course_category_id',
        'teacher_id',
        'class_id',
        'duration',
        'sessions_count',
        'start',
        'end',
        'price',
        'done',
        'equipments',
        'image_path',
    ];

    public function courseCategory(){
        return $this->belongsTo(CourseCategory::class);
    }

    public function teacher(){
        return $this->belongsTo(User::class);
    }

    public function class(){
        return $this->belongsTo(ClassHall::class);
    }
    
    public function session(){
        return $this->hasMany(Session::class);
    }
    public function userCourse(){
        return $this->hasMany(UserCourse::class);
    }

}
