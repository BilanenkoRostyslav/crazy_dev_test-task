<?php

namespace App\Http\Requests\GenreRequest;

use App\DataTransferObjects\FimDTO\FilmRequestDTO\GetFilmRequestDTO;
use App\DataTransferObjects\GenreDTO\GenreRequestDTO\GetGenreRequestDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use App\Http\Requests\BaseApiRequest;

class GetGenreRequest extends BaseApiRequest implements RequestInterfaceDTO
{

    public function rules(): array
    {
        return [
            'id' => ['required'],
        ];
    }

    public function authorize(): true
    {
        return true;
    }

    public function getDTO(): GetGenreRequestDTO
    {
        return GetGenreRequestDTO::from($this->all());
    }
}