<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const NEW_TASK = 1;
    const IN_WORK_TASK = 2;
    const CONSIDERATION_TASK = 3;
    const DONE_TASK = 4;

    protected $fillable = [
      'name'
    ];
}
