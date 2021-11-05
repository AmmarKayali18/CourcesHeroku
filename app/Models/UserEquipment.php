<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEquipment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_course_id',
        'equipment_id',
        'temporary',
    ];

    public function userCourse()
    {
        return $this->belongsTo(UserCourse::class,'user_course_id');
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class,'equipment_id');
    }
}
