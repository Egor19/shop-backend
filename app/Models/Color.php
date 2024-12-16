<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    protected $guarded = false;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'color_products', 'color_id', 'product_id');
    }
}
