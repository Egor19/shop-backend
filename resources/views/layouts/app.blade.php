<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <title>@yield('title', 'My Laravel App')</title>
        
      

      
    </head>
    <body>
    <header>
     
        

            <div class="header_logo">
                <a href="/">MARKET</a>
            </div>
            <nav>
                <ul>
                    <li><a href="/cart">Корзина</a></li>
                </ul>
            </nav>


        
        <!-- Если пользователь не авторизован -->
        @guest
        <button class="green"><a href="/login/view">Войти</a></button>
        <button class="green"><a href="/register">Регистрация</a></button>
        @endguest

        <!-- Если пользователь авторизован -->
        @auth
    <div class="user-info" style="display: flex; align-items: center;">
        <!-- Аватар пользователя -->
        <img src="{{ Auth::user()->profile_image_url ?? asset('default-avatar.png') }}" alt="User Avatar" class="user-avatar" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
        
        <!-- Имя пользователя -->
        <span>{{ Auth::user()->name }}</span>
        
        <!-- Форма для выхода -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
        <!-- Кнопка для выхода -->
        <button class="green" style="margin-left: 20px;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Выйти
        </button>
    </div>
       @endauth

         </header>
          <div class="center_block_main">
          
          <aside>
          <ul>
            @can('viewSeller', auth()->user())
                <li>
                    <a href="{{route('form.view')}}">Добавить товар</a>
                </li>
            @endcan
                <li>
                    <a href="list">Товары</a>
                </li>
            </ul>
            @yield('aside_content') <!-- New additional content section within aside -->
          </aside>
          <main>
          @yield('content')
          </main>
          </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>