<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'food_id',
        'portion_id',
        'restaurant_id',
        'details',
    ];

    
    public function foods(): HasMany
    {
        return $this->hasMany(Food::class);
    }
    
    public function portions(): HasMany
    {
        return $this->hasMany(Portion::class);
    }
    
    public function restaurants(): HasMany
    {
        return $this->hasMany(Restaurant::class);
    }
}
