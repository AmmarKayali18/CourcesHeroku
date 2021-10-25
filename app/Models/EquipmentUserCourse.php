<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentUserCourse extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'equipment_id',
        'user_course_id',
        'temporary',
        'delivered',
    ];
}
