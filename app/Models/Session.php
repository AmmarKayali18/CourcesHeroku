<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'count',
        'done',
        'start',
        'end',
        'date',
    ];

    public function course()
    {
       return $this->belongsTo(Course::class);
    }
}
