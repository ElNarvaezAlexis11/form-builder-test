<?php

namespace Tests\Feature\Documents;

use App\Http\Livewire\Documents\DocumentRecord;
use App\Models\Document;
use App\Models\SubTitleDocument;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @author Narvaez Ruiz Alexis
 */
class DocumentsManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_render_component()
    {
        Livewire::test(DocumentRecord::class)
            ->assertStatus(200);
    }

    public function test_can_create_a_new_document_with_the_model()
    {
        //$faker =  \Faker\Factory::create();
        $document = new  Document();
        $document->id =  \Faker\Factory::create()->uuid();
        $document->title = \Faker\Factory::create()->title();
        $document->save();
        $this->assertDatabaseHas('documents', [
            'id' => $document->id,
            'title' =>   $document->title
        ]);
    }

    public function test_can_create_a_new_subtitle_of_document_with_the_model()
    {
        Document::factory(10)->create();
        $subtitle = SubTitleDocument::factory()->create();
        $this->assertDatabaseCount('subtitle_document', 1);
        $this->assertDatabaseHas('subtitle_document', [
            'id' => $subtitle->id,
            'subTitle' => $subtitle->subTitle,
            'content' => $subtitle->content
        ]);
    }
}
