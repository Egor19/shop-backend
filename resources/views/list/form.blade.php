@extends('layouts.app')

@section('title', 'Добавить товар')

<style>
form {
        margin: 20px; /* Отступ от краев элемента */
        padding: 10px; /* Внутренний отступ формы */
        border: 1px solid #ccc; /* Граница формы */
        background-color: #f7f7f7; /* Фон формы */
        width: 300px; /* Ширина формы, можно настроить по вашему усмотрению */
    }

    /* Стиль для лейблов */
    label {
        display: block; /* Отображать лейбл как блочный элемент (под другими) */
        margin-bottom: 10px; /* Отступ снизу между лейблами */
    }

    /* Стиль для полей ввода */
    input {
        display: block; /* Отображать поля ввода как блочные элементы (под лейблами) */
        margin-bottom: 10px; /* Отступ снизу между полями ввода */
        width: 100%; /* Ширина полей ввода занимает всю доступную ширину формы */
        padding: 5px; /* Внутренний отступ полей ввода */
    }

    /* Стиль для кнопки "Отправить" */
    button {
        background-color: #007bff; /* Цвет фона кнопки */
        color: #fff; /* Цвет текста кнопки */
        padding: 10px 20px; /* Внутренний отступ кнопки */
        border: none; /* Убираем границу кнопки */
        cursor: pointer; /* Задаем указатель мыши в виде руки при наведении на кнопку */
        border-radius: 5px; /* Закругленные углы кнопки */
    }

    /* Стиль для кнопки при наведении */
    button:hover {
        background-color: #0056b3; /* Цвет фона кнопки при наведении */
    }
        </style>

@section('content')


  <h1>Заполните поля с информацией о ноутбуке: </h1>

   <!-- Сообщение об ошибке -->
   @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Сообщение об успехе -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
   
  <form action="{{ route('form.store') }}" method="post"  enctype="multipart/form-data">
  @csrf
  <label for="textInput1">Название:</label>
  <input type="text" id="textInput1" name='name' required>

  <label for="textInput2">Процессор:</label>
  <input type="text" id="textInput2" name='processor' required>

  <label for="textInput3">Объем памяти(Гб):</label>
  <input type="text" id="textInput3" name='memory_capacity' required>

  <label for="textInput4">Объем диска(Гб):</label>
  <input type="text" id="textInput4" name='disk_capacity' required>

  <label for="textInput5">Видеокарта:</label>
  <input type="text" id="textInput5" name='video_card' required>

  <label for="textInput6">Вес(кг):</label>
  <input type="text" id="textInput6" name='weight' required>

  <br>
  
  <label for="textInput8">Цена(рубли):</label>
  <input type="text" id="textInput8" name='price'>

  <label for="textInput9">Количество товара:</label>
  <input type="text" id="textInput9" name='count'>
  
  <label for="profile_image">Изображение товара:</label>
  <input type="file" name="profile_image" required>
   

  <br>
  <button type="submit" class="btn btn-success" id="myButton">Отправить</button>
  

  </form>

@endsection
