<?php

namespace App\Http\Requests\FilmRequests;

use App\DataTransferObjects\FimDTO\FilmRequestDTO\PostFilmRequestDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use App\Http\Requests\BaseApiRequest;

class PostFilmRequest extends BaseApiRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'name'   => ['required', 'string', 'min:3', 'max:255'],
            'poster' => ['nullable', 'image', 'dimensions:min_width=100,min_height=100, max_width=800,max_height=800'],
            'genres' => ['required', 'array'],
        ];
    }

    public function authorize(): true
    {
        return true;
    }

    public function getDTO(): PostFilmRequestDTO
    {
        return PostFilmRequestDTO::from($this->all());
    }
}
