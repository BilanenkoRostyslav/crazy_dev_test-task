<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilmRequests\DeleteFilmRequest;
use App\Http\Requests\FilmRequests\GetFilmRequest;
use App\Http\Requests\FilmRequests\PostFilmRequest;
use App\Http\Requests\FilmRequests\PutFilmRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use App\Services\FilmService;

class FilmController extends Controller
{
    public function __construct(
        readonly FilmService $service
    ) {
    }

    public function index()
    {
        $films = Film::where('status', '=', 'published')->paginate(10);

        return response()->json(FilmResource::collection($films));
    }

    public function store(PostFilmRequest $request)
    {
        $this->service->createFilm($request->getDTO());

        return response()->json('success', 200);
    }

    public function show(GetFilmRequest $request)
    {
        $film = $this->service->getFilm($request->getDTO());

        return response()->json($film);
    }

    public function update(PutFilmRequest $request)
    {
        $this->service->updateFilm($request->getDTO());

        return response()->json('success', 200);
    }

    public function destroy(DeleteFilmRequest $request)
    {
        $this->service->deleteFilm($request->getDTO());

        return response()->json('success', 200);
    }

    public function publish(PutFilmRequest $request)
    {
        $this->service->publishFilm($request->getDTO());

        return response()->json('success', 200);
    }
}
