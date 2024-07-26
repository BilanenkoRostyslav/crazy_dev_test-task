<?php

namespace App\Http\Requests\GenreRequest;

use App\DataTransferObjects\GenreDTO\GenreRequestDTO\PutGenreRequestDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use App\Http\Requests\BaseApiRequest;

class PutGenreRequest extends BaseApiRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'id'    => ['required'],
            'genre' => ['required'],
        ];
    }

    public function authorize(): true
    {
        return true;
    }

    public function getDTO(): PutGenreRequestDTO
    {
        return PutGenreRequestDTO::from($this->all());
    }
}
