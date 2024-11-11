<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    use HasFactory;

    protected $table = 'market';

    public $timestamps = false;

    protected $fillable = ["name",	"processor",	"memory_capacity",	"disk_capacity", "video_card",	"weight",	"profile_image",	"price", "count"];

    public function updateProductCount($id, $newCount)
    {
        // Находим товар по ID
        $product = Product::find($id);
    
        // Проверяем, существует ли товар
        if ($product) {
            // Изменяем значение count
            $product->count = $newCount;
    
            // Сохраняем изменения
            $product->save();
    
        } 
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter-> apply($builder);
    }
    

}
