<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends BaseController
{

   
      // Добавление товара в корзину
      public function addToCart($id)
      {

        $product = Product::findOrFail($id);
        $user_id = Auth::id(); 
        

        if (!$user_id) {
            return redirect()->route('login.view')->with('error', 'Вы должны войти в систему для добавления товара в корзину.');
        }
        else{
            $this->cartService->addProductToCart($product, $user_id);
    
            return redirect()->route('cart.index')->with('success', 'Товар добавлен в корзину!');

        }
        
    }

    
     
      // Просмотр корзины
      public function index()
      {
          $user_id = Auth::id();
          $cart = $this->cartService->getCart($user_id);
          return view('list.cart', compact('cart'));
      }
  
      // Удаление товара из корзины
      public function removeFromCart($id)
      {
          $user_id = Auth::id();  // Получаем текущего пользователя
          $this->cartService->removeProductFromCart($id, $user_id);
          return redirect()->back()->with('success', 'Product removed from cart!');
      }
  
      // Обновление количества товара в корзине
      public function updateCart(Request $request)
      {
        
          $user_id = Auth::id(); 
            // Логирование значений
          Log::info('Пользователь идентификатор: ' . $user_id);
          Log::info('ID товара: ' . $request->id);
          if($request->id && $request->quantity) {
            $this->cartService->updateCartQuantity($request->id, $request->quantity, $user_id);
            return redirect()->back()->with('success', 'Cart updated successfully!');
            }
          
      }
}
