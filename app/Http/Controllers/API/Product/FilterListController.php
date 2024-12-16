<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Tag;
use App\Models\Product;

use Illuminate\Http\Request;


class FilterListController extends Controller
{
    public function __invoke()
    {
        // Получаем минимальную и максимальную цену из запроса
    $maxPrice = Product::orderBy('price', 'DESC')->first()->price; // Начальное значение 0
    $minPrice = Product::orderBy('price', 'ASC')->first()->price; // Максимальное значение по умолчанию

    
    $colors = Color::all();
    $categories = Category::all();
    $tags = Tag::all();
  


    $result = [
        'categories' =>  $categories,
        'colors' => $colors,
        'tags' => $tags,
        'price' => [
            'max' => $maxPrice,
            'min' => $minPrice
        ],
        
    ];
    return response()->json($result);
        
    }
}
