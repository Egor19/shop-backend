<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ListController extends Controller
{
    public function __invoke(ProductFilter $filter)
    {
      //  $products = Product::paginate(10);
    //   Log::info('Received filter parameters:', $filter->request->all());

            // Получаем минимальную и максимальную цену из запроса
        // $maxPrice_0 = Product::max('price');
        // $minPrice_0 = Product::min('price');
        // $minPrice = $request->input('min_price', $minPrice_0); // Начальное значение 
        // $maxPrice = $request->input('max_price', $maxPrice_0); // Максимальное значение по умолчанию
    
        // Получаем продукты, отфильтрованные по цене
     //   $products = Product::whereBetween('price', [$minPrice, $maxPrice])->paginate(10);
        $products = Product::filter($filter)->paginate(10);
        $names = Product::distinct()->pluck('name');
        $processors = Product::distinct()->pluck('processor');
        $memory_capacities = Product::distinct()->pluck('memory_capacity');
        $video_cards = Product::distinct()->pluck('video_card');

    
        return view('list.index', compact('products', 'names', 'processors', 'memory_capacities', 'video_cards'));
    }
}
