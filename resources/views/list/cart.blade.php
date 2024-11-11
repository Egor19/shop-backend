@extends('layouts.app')

@section('title', 'Список товаров')


@section('content')

<head>
<link rel="stylesheet" href="{{ URL::asset('css/cart.css') }}">
</head>
<h1>Корзина</h1>
<div class="cart-container">
    @if(!empty($cart) && count($cart) > 0)
        <table class="cart-table" border="1">
            <tr>
                <th>Название</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Изображение</th>
                <th>Действия</th>
            </tr>
            @foreach($cart as $id => $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item['price'] }} руб.</td>
                    <td><div class="product-image">
                        <img src="{{ asset('storage/' . $item->product->profile_image) }}" alt="Product Image"></div>
                    </td>
                    <td>
                        <!-- Кнопка удаления товара из корзины -->
                         <form class="cart-form" action="{{ route('cart.remove', $item['product_id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="cart-button">Удалить</button>
                        </form>

                        <!-- Форма обновления количества товара -->
                        <form class="cart-form" action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item['product_id'] }}">
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                            <button class="cart-button" type="submit">Обновить</button>
                        </form>
                        <form class="cart-form" action="{{route('cart.buy', $item['product_id'] ) }}" method = "POST">   
                        @csrf
                        <button class="cart-button" type="submit">Купить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div>
            <a href="#">Оформить заказ</a>
        </div>
    @else
        <p>Ваша корзина пуста.</p>
    @endif

    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Обработка формы покупки (предположим, у вас есть форма с id "buy-form")
        const form = document.getElementById('buy-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Предотвращаем стандартное поведение формы

            const formData = new FormData(form);
            const url = form.action; // URL для отправки запроса

            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Для защиты от CSRF
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success(data.success); // Отображение успеха
                } else if (data.error) {
                    toastr.error(data.error); // Отображение ошибки
                }
            })
            .catch(error => {
                toastr.error('Произошла ошибка. Попробуйте еще раз.'); // Обработка ошибок сети
            });
        });
    });
</script>

@endsection