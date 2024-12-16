<?php

namespace App\Models;

use App\Http\Filters\P;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class Product extends Model
{

    use Filterable;

    protected $table = 'products';
    protected $guarded = false;

    public function category(){
        return $this->BelongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }


    public function getImageUrlAttribute(){
        return url('storage/' . $this->preview_image);
    }
    

}
