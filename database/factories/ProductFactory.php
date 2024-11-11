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
        'name' => $this->faker->randomElement(['Samsung', 'HP', 'MacBook', 'Acer', 'Lenovo']),
        'processor' => $this->faker->randomElement(['Intel', 'AMD', 'Apple']),
        'memory_capacity' => $this->faker->numberBetween(4, 64),
        'disk_capacity' => $this->faker->numberBetween(128, 2048),
        'video_card' => $this->faker->randomElement(['NVIDIA', 'AMD', 'Intel']),
        'weight' => $this->faker->randomFloat(2, 1, 5),
        'profile_image' => $this->faker->randomElement(['profile_image/4uAcuda4lonI1pivfh4p3skqY0kedCdf08KWPodF.webp', 'profile_image/dy4MhgxTrBp7toIj7sDrFvwgvLN4FxWm28gUXF4a.webp', 'profile_image/wGqOi2MSKXZKu3Vs60ayGcGDP4eJR58g9Bpq1qbY.png']),
        'price' => $this->faker->numberBetween(5000, 50000),
        'count' => $this->faker->numberBetween(1, 100),
        ];
    }
}
