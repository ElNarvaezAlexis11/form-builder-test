<?php

namespace Database\Seeders;

use App\Models\Painter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PainterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Painter::factory()->count(100)->create();
    }
}
