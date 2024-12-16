<?php

namespace App\Http\Requests\API\Product;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'categories' => 'nullable|integer', // Может быть числом или отсутствовать
        'colors' => 'nullable|array', // Если colors всегда string, иначе - nullable
        'prices' => 'nullable|array', // Проверка объекта как массива
        'prices.min' => 'nullable|integer|min:0', // Поле min должно быть числом >= 0
        'prices.max' => 'nullable|integer|min:0', // Поле max должно быть числом >= 0
        'tags' => 'nullable|array', // Проверка массива
         // Каждый элемент массива tags должен быть строкой
  
        
        ];
    }
}
