<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


        public function user()
        {
            return $this->hasOne(User::class, 'id', 'user_id');
        }
    public function product()
        {
            return $this->belongsTo(Product::class, 'product_id');
        }

    protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'phone',
        'address',
        'status',
        'image',
    ];
}
