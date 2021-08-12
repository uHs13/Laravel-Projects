<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function projects()
    {
        return $this->belongsToMany(
            'App\Models\Project',
            'relashionships',
            'developer_id',
            'project_id'
        );
    }
}