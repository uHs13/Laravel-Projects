<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];

    public static function getIdString(): string
    {

        $ids = array_values(self::pluck('id')->toArray());

        return implode(',', $ids);
    }
}