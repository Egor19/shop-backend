<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    // Название таблицы, если оно отличается от стандартного соглашения
    protected $table = 'cart_items';

    // Разрешенные для массового заполнения поля (fillable)
    protected $fillable = [
        'user_id',        // ID пользователя (если авторизован)
        'session_id',     // ID сессии (если пользователь не авторизован)
        'product_id',     // ID товара
        'quantity',       // Количество товара
    ];

    // Отношение к модели Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Отношение к модели User (если корзина привязана к пользователю)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
