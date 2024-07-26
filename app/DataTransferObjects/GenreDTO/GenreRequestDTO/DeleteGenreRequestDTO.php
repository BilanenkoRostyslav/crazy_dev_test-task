<?php

namespace App\DataTransferObjects\GenreDTO\GenreRequestDTO;

use Spatie\LaravelData\Data;

class DeleteGenreRequestDTO extends Data
{
    public string $id;
}