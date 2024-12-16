<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true), // Название товара
            'description' => $this->faker->sentence(10), // Краткое описание
            'content' => $this->faker->paragraph(5), // Полное описание
            'preview_image' => $this->faker->imageUrl(640, 480, 'fashion', true, 'clothes'), // Изображение
            'price' => $this->faker->randomFloat(2, 10, 500), // Цена в пределах 10-500
            'count' => $this->faker->numberBetween(1, 100), // Количество на складе
            'is_published' => $this->faker->boolean(80), // Опубликовано с вероятностью 80%
            'category_id' => $this->faker->numberBetween(1, 10), // Категория от 1 до 10
        ];
    }
}
