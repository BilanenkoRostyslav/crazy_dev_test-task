<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Genre;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name'     => 'Test',
            'email'    => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
        $genres = Genre::factory()->count(5)->create();
        Film::factory(50)
            ->state(new Sequence(
                ['status' => 'published'],
                ['status' => 'unpublished'],
            ))
            ->hasAttached($genres)
            ->create();
    }
}
