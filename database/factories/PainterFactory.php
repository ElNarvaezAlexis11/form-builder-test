<?php

namespace Database\Factories;

use App\Models\Painter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Painter>
 */
class PainterFactory extends Factory
{

    protected $model = Painter::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(20, 60),
            'awards' => $this->faker->numberBetween(20, 60)
        ];
    }
}
