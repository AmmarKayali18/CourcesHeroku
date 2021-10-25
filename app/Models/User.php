<?php

namespace App\Models;

use App\Models\Translations\UserTranslation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class User extends Authenticatable implements TranslatableContract
{
    use HasApiTokens, HasFactory, Notifiable , Translatable;

    public $translationModel = UserTranslation::class;

    public $translatedAttributes = ['name'];
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'email',
        'mobile',
        'address',
        'image_path',
        'type',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

}
