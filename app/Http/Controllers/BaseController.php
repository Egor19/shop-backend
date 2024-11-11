<?php

namespace App\Http\Controllers;

use App\Services\CartService;

class BaseController extends Controller
{

    public $cartService;

    function __construct(CartService $cartService)
    {
        $this->cartService= $cartService;
    }
}
