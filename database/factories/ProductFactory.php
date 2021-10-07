<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->word,
            'product_price' => $this->faker->numberBetween(-10000, 10000),
            'status' => $this->faker->numberBetween(-8, 8),
            'product_image' => $this->faker->word,
            // 'category_id' => Category::factory(),
        ];
    }
}
