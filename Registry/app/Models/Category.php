<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function getIdString(): string
    {

        $ids = array_values(self::pluck('id')->toArray());

        return implode(',', $ids);
    }
}
