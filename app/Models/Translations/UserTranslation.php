<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTranslation extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'name',
        'locale',
    ];
}
