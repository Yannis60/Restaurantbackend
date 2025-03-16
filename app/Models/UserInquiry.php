<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInquiry extends Model
{    
    use SoftDeletes;

    protected $fillable = [
        'fullname',
        'email',
        'subject',
        'inquiry_type_id',
        'message',
    ];
}
