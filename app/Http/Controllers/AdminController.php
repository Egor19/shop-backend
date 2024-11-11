<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Filters\ProductFilter;

class AdminController extends Controller
{
    public function index(){
        return view('admin.main');
    }

    public function viewForm(){
        return view('layouts.admin.form');
    }

    public function viewList(ProductFilter $filter){
        $products = Product::filter($filter)->paginate(10);
        $names = Product::distinct()->pluck('name');
        $processors = Product::distinct()->pluck('processor');
        $memory_capacities = Product::distinct()->pluck('memory_capacity');
        $video_cards = Product::distinct()->pluck('video_card');

    
        return view('admin.list', compact('products', 'names', 'processors', 'memory_capacities', 'video_cards'));
    }
}
