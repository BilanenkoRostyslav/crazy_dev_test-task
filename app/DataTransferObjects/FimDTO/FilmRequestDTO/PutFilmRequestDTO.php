<?php

namespace App\DataTransferObjects\FimDTO\FilmRequestDTO;

use Spatie\LaravelData\Data;

class PutFilmRequestDTO extends Data
{
    public int $id;
    public string $name;
    public string $status;
    public array $genres;
}