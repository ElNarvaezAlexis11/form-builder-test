<?php

namespace Tests\Feature;

use App\Http\Livewire\CreatePainters;
use App\Models\Painter;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Contracts\Auth\Authenticatable;

class CreatePainterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_painter_can_be_created()
    {
        // 1 - given: Teniendo la informacion del pintor 
        $painter = [
            'name' => "Bob Ross",
            'age' => 54,
            'awards' => 5
        ];
        // 2 - when: Cuando la guardemos  
        Painter::create($painter);

        // 3 - then: debemos de comprobar que los datos coincidan en la base datos.
        $this->assertDatabaseHas('painter', $painter);
        //$response = $this->get('/');

        //$response->assertStatus(200);
    }

    public function test_can_access_to_painters_create()
    {
        $this->withoutExceptionHandling();
        $response  = $this->actingAs(User::factory()->withPersonalTeam()->create());
        
        $response2 = $this->get(route('painters.create'));
        $response2->assertOk();
    }


    public function test_can_create_a_painter_from_view()
    {
        //$this->actingAs(User::factory()->create());
        Livewire::test(CreatePainters::class)
            ->assertStatus(200);
        Livewire::test(
            CreatePainters::class,
            [
                'name' => 'Omar Ibañez Alvaro Eduardo',
                'age' => 50,
                'awards' => 4
            ]
        )
            ->call('save');
            /*$this->assertTrue(Painter::where('name', 'LIKE', 'Omar Ibañez Alvaro Eduardo')->exists())*/;
    }
}
