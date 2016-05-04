<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'photo', 'model', 'price',
    ];

    /*
     | Relationship
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
