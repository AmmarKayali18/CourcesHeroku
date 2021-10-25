<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentTranslation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'equipment_id',
        'name',
        'description',
        'locale',
    ];
}
