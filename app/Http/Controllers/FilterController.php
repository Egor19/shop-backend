<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FilterController extends Controller
{
    public function __invoke(Request $request)
    {
        // Получаем минимальную и максимальную цену из запроса
    $minPrice = $request->input('min_price', 0); // Начальное значение 0
    $maxPrice = $request->input('max_price', 100000); // Максимальное значение по умолчанию

    // Получаем продукты, отфильтрованные по цене
    $products = Product::whereBetween('price', [$minPrice, $maxPrice])->paginate(10);

    return view('products.index', compact('products', 'minPrice', 'maxPrice'));
        
    }
}
