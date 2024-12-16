<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Color;
use App\Models\Tag;

class AdminController extends Controller
{
    public function index(){
        return view('admin.main');
    }

    public function viewForm(){
        $categories = Category::all();
        $colors = Color::all();
        $tags = Tag::all();


        return view('layouts.admin.form', compact('categories', 'colors', 'tags'));
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
