<?php

namespace App\Http\Requests\GenreRequest;

use App\DataTransferObjects\GenreDTO\GenreRequestDTO\PostGenreRequestDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use App\Http\Requests\BaseApiRequest;

class PostGenreRequest extends BaseApiRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'genre' => ['required'],
        ];
    }

    public function authorize(): true
    {
        return true;
    }

    public function getDTO(): PostGenreRequestDTO
    {
        return PostGenreRequestDTO::from($this->all());
    }
}
