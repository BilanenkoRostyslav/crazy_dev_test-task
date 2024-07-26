<?php

namespace App\DataTransferObjects\GenreDTO\GenreRequestDTO;

use Spatie\LaravelData\Data;

class PutGenreRequestDTO extends Data
{
    public string $id;
    public string $genre;
}