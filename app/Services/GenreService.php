<?php

namespace App\Services;

use App\DataTransferObjects\GenreDTO\GenreRequestDTO\DeleteGenreRequestDTO;
use App\DataTransferObjects\GenreDTO\GenreRequestDTO\GetGenreRequestDTO;
use App\DataTransferObjects\GenreDTO\GenreRequestDTO\PostGenreRequestDTO;
use App\DataTransferObjects\GenreDTO\GenreRequestDTO\PutGenreRequestDTO;
use App\Http\Resources\FilmResource;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GenreService
{
    public function createGenre(PostGenreRequestDTO $dto): void
    {
        Genre::create([
            'genre' => $dto->genre,
        ]);
    }

    public function getGenre(GetGenreRequestDTO $dto): string|GenreResource
    {
        try {
            return new GenreResource($this->findGenre($dto->id));
        } catch (ModelNotFoundException $exception) {
            throw new HttpResponseException(response()->json(['Error' => "Genre not found", 404]));
        }
    }

    private function findGenre(string $id): Genre
    {
        return Genre::findOrFail($id);
    }

    public function updateGenre(PutGenreRequestDTO $dto): void
    {
        try {
            $genre = $this->findGenre($dto->id);
            $genre->update(['genre' => $dto->genre]);
        } catch (ModelNotFoundException $exception) {
            throw new HttpResponseException(response()->json(["message" => "Genre not found"], 404));
        }
    }

    public function deleteGenre(DEleteGenreRequestDTO $dto): void
    {
        try {
            $genre = $this->findGenre($dto->id);
            $genre->delete();
        } catch (ModelNotFoundException $exception) {
            return;
        }
    }

    public function getFilms(GetGenreRequestDTO $dto): BelongsToMany
    {
        try {
            $genre = $this->findGenre($dto->id);

            return $genre->films();
        } catch (ModelNotFoundException $exception) {
            throw new HttpResponseException(response()->json(["message" => "Genre not found"], 404));
        }
    }
}