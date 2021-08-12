<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function storage()
    {
        return $this->belongsTo('\App\Models\Storage', 'storage_id', 'id');
    }
}