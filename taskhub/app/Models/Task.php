<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    protected $fillable = [
        'taskname',
        'description',
        'status',
        'datetime'
    ];

    protected $casts = [
        'datetime' => 'datetime'
    ];

    public $timestamps = false;

}
