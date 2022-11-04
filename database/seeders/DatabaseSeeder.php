<?php

namespace Database\Seeders;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(PainterSeeder::class);
        $this->call(PaintingsSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(SubTitleDocumentSeeder::class);
        $this->call(BookSeeder::class);

        $user = User::factory()->create();
        $team = Team::factory()->create();
        $user->teams()->attach($team,[
            'role' => 'editor'
        ]);
        $user->switchTeam($team);
    
    }
}
