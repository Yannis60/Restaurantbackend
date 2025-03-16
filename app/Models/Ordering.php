<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ordering extends Model
{    
    use SoftDeletes;

    protected $fillable = [
        'ordering_date',
        'amount',
        'menu_id',
        'table_space_id',
    ];
}
