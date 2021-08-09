<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email'
    ];

    public function address()
    {
        return $this->hasOne('\App\Models\Address', 'person_id', 'id');
    }
}
