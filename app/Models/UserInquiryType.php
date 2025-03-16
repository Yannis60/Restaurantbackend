<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInquiryType extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
    ];
}
