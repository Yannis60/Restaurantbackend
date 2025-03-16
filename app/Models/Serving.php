<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serving extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'serving_date',
        'status',
        'remarks',
        'ordering_id'
    ];
}
