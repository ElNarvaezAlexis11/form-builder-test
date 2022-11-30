<?php

namespace Database\Seeders;

use App\Models\Painter;
use App\Models\Paintings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaintingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paintings::factory()
            ->count(100)
            ->sequence(
                fn ($sequence) => [
                    'idPainter' => Painter::inRandomOrder()->first(),
                ]
            )
            ->create();
        Paintings::factory()
            ->count(100)
            ->withWidth(200)
            ->sequence(
                fn ($sequence) => [
                    'idPainter' => Painter::inRandomOrder()->first(),
                ]
            )
            ->create();
    }
}
