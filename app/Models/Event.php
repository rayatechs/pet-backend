<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = "events";

    protected $fillable = ['name'];

    #region relationships
    public function alarms()
    {
        return $this->hasMany(Alarm::class);
    }
    #endregion

    #region function
    public static function getAll()
    {
        return self::orderBy('created_at', 'desc');
    }
    #endregion
}
