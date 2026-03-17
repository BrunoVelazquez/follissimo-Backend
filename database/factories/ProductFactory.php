<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;

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
    protected $model = Product::class;
    public function definition(): array
    {

        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(100, 5000),
            'color' => $this->faker->colorName(),
            'category_id' => Category::query()->inRandomOrder()->value('id'),
            'size_id' => Size::query()->inRandomOrder()->value('id'),
            'description' => $this->faker->sentence(12),
        ];
    }
}
