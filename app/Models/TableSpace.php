<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableSpace extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'restaurant_id',
    ];
}
