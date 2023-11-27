<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Alarm extends Model
{
    use HasFactory;

    protected $table = 'alarms';
    protected $fillable = [
        'user_id',
        'event_id',
        'name',
        'due'
    ];

    #region relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    #endregion

    #region function

    public static function getUserAlarms()
    {
        return self::where('user_id', auth()->user()->id)->get();
    }

    public static function convertDueDateToGregorian($date)
    {
        return Jalalian::fromFormat('Y-m-d H:i:sP', $date)->toCarbon()->toDateTimeString();
    }
    #endregion
}
