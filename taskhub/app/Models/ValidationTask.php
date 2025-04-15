<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValidationTask
{
    public const RULE_TASK = [
        'taskname' => 'required | max:80',
        'description'=> 'required | max:255| min:5',
        'status'=> 'required',
        'datetime'=> 'required | date_format: "Y-m-d"'
    ];

}