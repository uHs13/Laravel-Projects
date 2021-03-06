<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function items()
    {
        return $this->hasMany('App\Models\Item', 'storage_id', 'id');
    }
}