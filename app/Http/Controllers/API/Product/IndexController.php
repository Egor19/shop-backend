<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Filters\ProductFilter;
use App\Http\Resources\Product\ResourceProduct;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\API\Product\IndexRequest;


class IndexController extends Controller
{
    public function __invoke()
    {

        $products = Product::all();
        return ResourceProduct::collection($products);
        
    }

}
