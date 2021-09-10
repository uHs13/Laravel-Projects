<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(
            'App\Models\Category',
            'products_categories'
        );
    }
}