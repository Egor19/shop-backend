<?php

namespace App\Http\Controllers;
use App\Services\CartService;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Подключаем фасад Log

class BuyController extends Controller
{
    public function __invoke($product_id)
    {
        $id = $product_id; // Получаем id из маршрута
        $user_id = Auth::id(); 
        $cartItem = CartItem::where('user_id', $user_id)->where('product_id', $id)->first();
        Log::info('Пользователь идентификатор: ' . $user_id);
        Log::info('ID товара: ' . $id);
        if (!$cartItem) {
            return response()->json(['error' => 'Товар не найден в корзине.']);
        }

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Товар не найден.']);
        }

        if ($cartItem->quantity == $product->count) {
            // Удаление товара, если количество в корзине совпадает с количеством на складе
            $product->delete();
            $cartItem->delete();
            return response()->json(['success' => 'Товар был куплен и удален из списка продуктов.']);
        } elseif ($cartItem->quantity < $product->count) {
            // Обновление количества товара
            $newCount = $product->count - $cartItem->quantity;
            $cartItem->delete();
            $product->update(['count' => $newCount]);
            return response()->json(['success' => 'Количество товара обновлено.']);
        } else {
            return response()->json(['error' => 'Недостаточно товара на складе.']);
        }
    }
}
