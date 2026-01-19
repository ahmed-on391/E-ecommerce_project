<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {

            if (!$product->slug) {
                $slug = Str::slug($product->title);

                // نتأكد إن الـ slug فريد
                $count = static::where('slug', 'like', "$slug%")->count();

                $product->slug = $count ? "{$slug}-{$count}" : $slug;
            }

        });
    }

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'price',
        'category',
        'quantity',
    ];
}
