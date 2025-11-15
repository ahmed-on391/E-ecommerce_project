<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }

     public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
