<?php

namespace Database\Factories;

use App\Models\Painter;
use App\Models\Paintings;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paintings>
 */
class PaintingsFactory extends Factory
{
    protected $model = Paintings::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'width' => $this->faker->numberBetween(150,300) * 1.0,
            'height' =>  $this->faker->numberBetween(150,300) * 1.0,
            'idPainter' => Painter::inRandomOrder()->get()->first()
        ];
    }
}
