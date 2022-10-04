<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'executor_id',
        'creator_id',
        'title',
        'description',
        'status_id',
        'priority_id',
        'group_id'
    ];
}
