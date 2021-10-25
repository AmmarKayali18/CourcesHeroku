<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'course_id',
        'student_id',
        'done',
        'continue',
        'mark',
        'register_date',
        'end_date',
        'taken_equipment',
        'is_paid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'student_id');
    }
}
