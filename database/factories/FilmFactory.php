<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition(): array
    {
        return [
            'name'   => $this->faker->name(),
            'poster' => 'public/images/default.png',
            'status' => 'published',
        ];
    }
}
