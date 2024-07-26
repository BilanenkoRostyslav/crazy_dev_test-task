<?php

namespace App\Services;

use App\DataTransferObjects\FimDTO\FilmRequestDTO\DeleteRequestDTO;
use App\DataTransferObjects\FimDTO\FilmRequestDTO\GetFilmRequestDTO;
use App\DataTransferObjects\FimDTO\FilmRequestDTO\PostFilmRequestDTO;
use App\DataTransferObjects\FimDTO\FilmRequestDTO\PutFilmRequestDTO;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;

class FilmService
{
    public function createFilm(PostFilmRequestDTO $dto): void
    {
        $film = new Film([
            'name' => $dto->name,
        ]);
        if (is_null($dto->poster)) {
            $film->poster = 'public/images/default.png';
        } else {
            $film->poster = $dto->poster->store('public/images');
        }
        $film->save();
        $film->genres()->attach($dto->genres);
    }

    public function getFilm(GetFilmRequestDTO $dto): FilmResource
    {
        try {
            return new FilmResource($this->findFilm($dto->id));
        } catch (ModelNotFoundException $exception) {
            throw new HttpResponseException(response()->json(['Error' => "Film not found"], 404));
        }
    }

    public function updateFilm(PutFilmRequestDTO $dto): void
    {
        try {
            $film = $this->findFilm($dto->id);
            $film->update([
                'name' => $dto->name,
            ]);
            $film->genres()->sync($dto->genres);
        } catch (ModelNotFoundException $exception) {
            throw new HttpResponseException(response()->json(['Error' => "Film not found"], 404));
        }
    }

    public function deleteFilm(DeleteRequestDTO $dto): void
    {
        try {
            $this->findFilm($dto->id)->delete();
        } catch (ModelNotFoundException $exception) {
            return;
        }
    }

    public function publishFilm(PutFilmRequestDTO $dto): void
    {
        try {
            $film = $this->findFilm($dto->id);
            $film->update(['status' => 'published']);
        } catch (ModelNotFoundException $exception) {
            throw new HttpResponseException(response()->json(['Error' => "Film not found"], 404));
        }
    }

    private function findFilm(string $id): Film
    {
        return Film::findOrFail($id);
    }
}