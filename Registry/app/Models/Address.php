<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'street', 'district', 'city', 'state', 'country', 'person_id'
    ];

    public function person()
    {
        return $this->belongsTo('\App\Models\Person', 'person_id', 'id');
    }
}