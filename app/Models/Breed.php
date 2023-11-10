<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    protected $table = "breeds";


    protected $fillable = [
        'name',
        'parent_id'
    ];


    #region relationships
    public function parent()
    {
        return $this->belongsTo(Breed::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Breed::class, 'parent_id');
    }

    #endregion

    #region function
    public static function getParentWithchildren()
    {
        return self::whereNull('parent_id')->get();
    }

    #endregion
}
