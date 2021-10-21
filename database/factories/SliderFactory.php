<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Slider;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description1' => $this->faker->word,
            'description2' => $this->faker->word,
            'slider_image' => $this->faker->word,
            'status' => $this->faker->numberBetween(-8, 8),
        ];
    }
}
