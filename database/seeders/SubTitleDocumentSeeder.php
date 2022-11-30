<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\SubTitleDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubTitleDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubTitleDocument::factory()
            ->count(100)
            ->sequence(
                fn ($sequence) => [
                    'document_id' => Document::inRandomOrder()->first(),
                ]
            )
            ->create();
    }
}
