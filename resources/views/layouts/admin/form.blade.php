@extends('admin.main')

@section('title', 'Добавить товар')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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


  <h1>Заполните поля с информацией о товаре: </h1>

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
  <div class="form-group">
  <label for="textInput1">Название:</label>
  <input type="text" id="textInput1" name='title' required>
  </div>
  
  <div class="form-group">
  <label for="textInput2">Описание:</label>
  <input type="text" id="textInput2" name='description' required>
  </div>

  <div class="form-group">
  <label for="textInput3">Контент:</label>
  <input type="text" id="textInput3" name='content' required>
  </div>

  <div class="form-group">
  <label for="textInput8">Цена(рубли):</label>
  <input type="text" id="textInput8" name='price'>
  </div>

  <div class="form-group">
  <label for="textInput9">Количество товара:</label>
  <input type="text" id="textInput9" name='count'>
  </div>
  
  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                      </div>
                      <div class="input-group-append">
                        <!-- <span class="input-group-text">Загрузить</span> -->
                      </div>
                    </div>
  </div>

  <div class="form-group">
        
                  <select name="category_id" class="form-control select2" style="width: 100%;">
                    <option selected="selected" disabled>Выберите категорию</option>
                    @foreach($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                    @endforeach
                  </select>
  </div>


  <div class="form-group">
  <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                    @foreach($tags as $tag)
                    <option value="{{ $tag['id'] }}">{{$tag['title']}}</option>
                    @endforeach
                  </select>
  </div>
<div class="form-group">
<select name="colors[]" class="colors" multiple="multiple" data-placeholder="Выберите цвет" style="width: 100%;">
                    @foreach($colors as $color)
                    <option value="{{ $color['id'] }}" data-color="{{ $color['title'] }}">{{ $color['title'] }}</option>
                    @endforeach
                  </select>
</div>
   
   

  <br>
  <button type="submit" class="btn btn-success" id="myButton">Отправить</button>
  

  </form>

  <script>
  $(document).ready(function() {
    $('.colors').select2({
      templateResult: formatColor,
      templateSelection: formatColor
    });

    function formatColor(color) {
      if (!color.id) {
        return color.text;
      }
      var colorCode = $(color.element).data('color');
      var $colorBox = $(
        '<span><span style="display: inline-block; width: 20px; height: 20px; background-color:' + colorCode + '; border: 1px solid #000; margin-right: 5px;"></span>' + color.text + '</span>'
      );
      return $colorBox;
    }
  });
</script>

@endsection


