<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'memory_capacity' => 'required|integer|max:255',
            'disk_capacity' => 'required|integer|max:255',
            'video_card' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'profile_image' => 'required|image|max:2048',
            'price' => 'required|numeric',
            'count' => 'required|integer|max:255',
        ];
    }
}
