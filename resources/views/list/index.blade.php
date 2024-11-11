@extends('layouts.app')

@section('title', 'Список товаров')


@section('content')
<head>
<link rel="stylesheet" href="{{ URL::asset('css/list.css') }}">
</head>


<br>
@section('aside_content')

 <!-- Форма фильтрации -->
 <aside class="filter-section">
        
        <!-- Другие фильтры здесь -->
        <form action="{{ route('list.index') }}" method="GET" class="filter-form">
                <!-- Дополнительные фильтры -->
                <label for="name">Марка:</label>
                <select name="name" id="name">
                    <option value="">Все</option>
                    @foreach($names as $name)
                        <option value="{{ $name }}" {{ request('name') == $name ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                <br>
                <label for="processor">Процессор:</label>
                <select name="processor" id="processor">
                    <option value="">Все</option>
                    @foreach($processors as $processor)
                        <option value="{{ $processor }}" {{ request('processor') == $processor ? 'selected' : '' }}>{{ $processor }}</option>
                    @endforeach
                </select>
                <br>
                <label for="memory_capacity">Оперативная память:</label>
                <select name="memory_capacity" id="memory_capacity">
                    <option value="">Все</option>
                    @foreach($memory_capacities as $memory_capacity)
                        <option value="{{ $memory_capacity }}" {{ request('memory_capacity') == $memory_capacity ? 'selected' : '' }}>{{ $memory_capacity }} ГБ</option>
                    @endforeach
                </select>
                <br>
                <label for="video_card">Видеокарта:</label>
                <select name="video_card" id="video_card">
                    <option value="">Все</option>
                    @foreach($video_cards as $video_card)
                        <option value="{{ $video_card }}" {{ request('video_card') == $video_card ? 'selected' : '' }}>{{  $video_card }}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="filter-btn">Применить фильтр</button>
            </form>
    </aside>
        
@endsection

<div class="card-container">
    @foreach($products as $product)
        <div class="product-card">
            <div class="product-image">
                <img src="{{ asset('storage/' . $product->profile_image) }}" alt="Product Image">
            </div>
            <div class="product-info">
                <div class="product-title">{{ $product->name }}</div>
                <div class="product-spec">Процессор: {{ $product->processor }}</div>
                <div class="product-spec">Оперативная память: {{ $product->memory_capacity }} ГБ</div>
                <div class="product-spec">Память: {{ $product->disk_capacity }} ГБ</div>
                <div class="product-spec">Видеокарта: {{ $product->video_card }}</div>
                <div class="product-spec">Вес: {{ $product->weight }} кг</div>
                <div class="product-price">{{ $product->price }} ₽</div>
                <div class="product-footer">
                @auth
               <form action="{{ route('cart.add', $product->id) }}" method="POST">
               @csrf
               <button class="product-btn" type="submit">Добавить в корзину</button>
               </form>
               @else
               <a href="{{ route('login.view') }}" class="product-btn">Добавить в корзину</a>
               @endauth
               </div>
            </div>
        </div>
    @endforeach
</div>
<div class="pagination">
        
    {{$products->withQueryString()->links()}}
        
</div>


<script>
    const minRange = document.getElementById('min_price');
    const maxRange = document.getElementById('max_price');
    const minPriceDisplay = document.getElementById('min_price_display');
    const maxPriceDisplay = document.getElementById('max_price_display');
    const sliderTrack = document.querySelector('.slider-track');
    
    function updateSlider() {
        const min = parseInt(minRange.value);
        const max = parseInt(maxRange.value);
        
        if (min > max) minRange.value = max;
        if (max < min) maxRange.value = min;

        minPriceDisplay.textContent = min;
        maxPriceDisplay.textContent = max;

        const percentMin = (min / minRange.max) * 100;
        const percentMax = (max / maxRange.max) * 100;

        sliderTrack.style.left = percentMin + '%';
        sliderTrack.style.width = (percentMax - percentMin) + '%';
    }

    minRange.addEventListener('input', updateSlider);
    maxRange.addEventListener('input', updateSlider);

    updateSlider();
</script>

@endsection
