<?php

namespace App\Http\Controllers\Api\V1;

use App\DataTransferObjects\GenreDTO\GenreRequestDTO\GetGenreRequestDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest\DeleteGenreRequest;
use App\Http\Requests\GenreRequest\GetGenreRequest;
use App\Http\Requests\GenreRequest\PostGenreRequest;
use App\Http\Requests\GenreRequest\PutGenreRequest;
use App\Http\Resources\FilmResource;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use App\Services\GenreService;

class GenreController extends Controller
{
    public function __construct(
        readonly private GenreService $service
    ) {
    }

    public function index()
    {
        $genres = Genre::all();

        return response()->json(GenreResource::collection($genres));
    }

    public function store(PostGenreRequest $request)
    {
        $this->service->createGenre($request->getDTO());

        return response()->json('Success', 200);
    }

    public function show(GetGenreRequest $request)
    {
        return response()->json($this->service->getGenre($request->getDTO()));
    }

    public function update(PutGenreRequest $request)
    {
        $this->service->updateGenre($request->getDTO());

        return response()->json('Success', 200);

    }

    public function destroy(DeleteGenreRequest $request)
    {
        $this->service->deleteGenre($request->getDTO());

        return response()->json('Success', 200);
    }

    public function films(GetGenreRequest $request)
    {
        $films = $this->service->getFilms($request->getDTO());

        return response()->json(FilmResource::collection($films->paginate(10)));
    }
}
