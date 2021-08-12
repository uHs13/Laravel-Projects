<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function developers()
    {
        return $this->belongsToMany(
            'App\Models\Developer',
            'relashionships',
            'project_id',
            'developer_id'
        );
    }
}
