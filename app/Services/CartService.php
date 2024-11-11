<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class CartService
{
  public function addProductToCart(Product $product, $userId = null)
  {
    

      $cartItem = CartItem::where('user_id', $userId)
          ->where('product_id', $product->id)
          ->first();
        
      if ($cartItem) {
        
          $cartItem->quantity += 1;
          $cartItem->save();
      } else {

          CartItem::create([
              'user_id' => $userId,
              'product_id' => $product->id,
              'quantity' => 1,
          ]);
      }
  }

  public function getCart($userId = null)
  {
      return CartItem::where('user_id', $userId)->with('product')->get();
  }

  public function removeProductFromCart($productId, $userId = null)
  {
      CartItem::where('user_id', $userId)->where('product_id', $productId)->delete();
  }

  public function updateCartQuantity($productId, $quantity, $userId = null)
  {
    $userExists = User::where('id', $userId)->exists();
    $productExists = Product::where('id', $productId)->exists();

    if ($userExists && $productExists) {
    CartItem::where('user_id', $userId)
    ->where('product_id', $productId)
    ->update(['quantity' => $quantity]);
    }
  
   } 
}