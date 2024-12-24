<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Filters\ProductFilter;
use App\Models\Product;
use App\Http\Resources\Product\ResourceProduct;
use Illuminate\Support\Facades\Log;
use App\Services\ProductSortService;



class ProductFilterController extends Controller
{

    public function __invoke(IndexRequest $request)
    {
        Log::info('Request received in ProductFilterController:', [
            'queryParams' => $request->all(),
        ]);
    $data = $request->validated();
    Log::info('i am hereeee111', ['data' => $data]);
    $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
    Log::info('i am hereeee', ['data' => $data]);
    //$sortBy = $request->get('sortBy.sort', 'default_column');  // Например, если параметр сортировки 'sort'
      // Параметр 'direction' для порядка сортировки

    // Применяем фильтрацию и сортировку
    $products = Product::filter($filter)
        ->sort($request)
        ->paginate(1);  // Используем правильный метод пагинации


           // Лог результата
        //    Log::info('Filtered products:', [
        //     'products' => $products->toArray(),
        // ]);
    // Log::info('Request Query:', ['products' => $products->toArray()]);
    return ResourceProduct::collection($products);
    }
}
