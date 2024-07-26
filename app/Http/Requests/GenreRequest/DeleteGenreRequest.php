<?php

namespace App\Http\Requests\GenreRequest;

use App\DataTransferObjects\GenreDTO\GenreRequestDTO\DeleteGenreRequestDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use App\Http\Requests\BaseApiRequest;

class DeleteGenreRequest extends BaseApiRequest implements RequestInterfaceDTO
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

    public function getDTO(): DeleteGenreRequestDTO
    {
        return DeleteGenreRequestDTO::from($this->all());
    }
}