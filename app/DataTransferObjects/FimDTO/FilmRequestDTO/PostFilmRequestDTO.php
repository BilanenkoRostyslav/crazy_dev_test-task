<?php

namespace App\DataTransferObjects\FimDTO\FilmRequestDTO;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class PostFilmRequestDTO extends Data
{
    public string $name;
    public ?UploadedFile $poster;
    public array $genres;
}