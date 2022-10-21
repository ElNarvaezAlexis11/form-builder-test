<?php

namespace Tests\Feature;

use App\Http\Livewire\FormBook;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;


/**
 * @uthor Narvaez Ruiz Alexis 
 */
class booksManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function the_component_can_rendered()
    {
        Livewire::test(FormBook::class)
            ->assertStatus(200);
    }


    /** 
     * Comprubea que si se guardo el "libro" en la base de datos.
     * @test 
     */
    public function a_new_book_can_be_created()
    {
        //$this->actingAs(User::factory()->create());

        Livewire::test(FormBook::class)
            ->set('title', 'El amor en los tiempo del colera')
            ->set('release', '2022-09-23')
            ->set('resume', 'Florentino se reencuentra con su amaada..')
            ->call('submit');

        $this->assertDatabaseHas('books', [
            'title' => 'El amor en los tiempo del colera',
            'release' => '2022-09-23',
            'resume' => 'Florentino se reencuentra con su amaada..'
        ]);
    }

    public function test_title_of_book_is_required()
    {
        Livewire::test(FormBook::class)
            ->set('title', null)
            ->set('release', '2022-09-23')
            ->set('resume', 'Florentino se reencuentra con su amaada..')
            ->call('submit')
            ->assertHasErrors('title');
    }

    public function test_release_date_of_book_is_required()
    {
        Livewire::test(FormBook::class)
            ->set('title', 'La noche estrellada')
            ->set('release',null)
            ->set('resume', 'Florentino se reencuentra con su amaada..')
            ->call('submit')
            ->assertHasErrors('release');
    }
}
