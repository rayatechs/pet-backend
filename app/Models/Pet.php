<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\EnumeratesValues;
use Morilog\Jalali\Jalalian;

class Pet extends Model
{
    use HasFactory;

    protected $table = "pets";

    const SEX_PET = [
        'MALE'   => 'male',
        'FEMALE' => 'female'
    ];

//    const TRAINING_LEVEL = [
//        'BEGINNER'     => 'beginner',
//        'INTERMEDIATE' => 'intermediate',
//        'PROFESSIONAL' => 'professional',
//    ];

    protected $fillable = [
        'name',
        'user_id',
        'breed_id',
        'birthdate',
        'sex',
        'avatar',
    ];

    protected $casts = [
        'sex' => 'string', // Cast the 'sex' field to a string
        'training_level' => 'string',
    ];
    #region relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
    #endregion

    #region function
    public static function convertBirthdateToDateGregorian($date): string
    {
        return Jalalian::fromFormat('Y-m-d', $date)->toCarbon()->toDateTimeString();
    }
    #endregion
}
