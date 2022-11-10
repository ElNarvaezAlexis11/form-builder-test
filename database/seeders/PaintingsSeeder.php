<?php

namespace Database\Seeders;

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
        Paintings::factory(100)->create();
        Paintings::factory(100)->withWidth(200)->create();
    }
}
