<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Filters\ProductFilter;
use App\Models\Product;
use App\Http\Resources\Product\ResourceProduct;
use Illuminate\Support\Facades\Log;



class ProductFilterController extends Controller
{
    public function __invoke(IndexRequest $request){
           
        Log::info('Request received in ProductFilterController:', [
            'queryParams' => $request->all(),
        ]);
    $data = $request->validated();
    $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
    
    $products = Product::filter($filter)->pagination(1);
           // Лог результата
           Log::info('Filtered products:', [
            'products' => $products->toArray(),
        ]);
    // Log::info('Request Query:', ['products' => $products->toArray()]);
    return ResourceProduct::collection($products);
}
}
