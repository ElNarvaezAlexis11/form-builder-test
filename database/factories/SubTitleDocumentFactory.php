<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BodyComponent>
 */
class SubTitleDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'document_id' => Document::inRandomOrder()
                                ->get()
                                ->first(),
            'subTitle' => $this->faker->title(),
            'content' => $this->faker->paragraph()
        ];
    }
    public function withDocument(Document $document)
    {
        return $this->state(function (array $attributes) use ($document) {
            return [
                'document_id' => $document->id,
            ];
        });
    }
}
