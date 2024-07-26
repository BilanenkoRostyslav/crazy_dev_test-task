<?php

namespace App\Http\Requests\FilmRequests;

use App\DataTransferObjects\FimDTO\FilmRequestDTO\GetFilmRequestDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use App\Http\Requests\BaseApiRequest;

class GetFilmRequest extends BaseApiRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'id' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function getDTO(): GetFilmRequestDTO
    {
        return GetFilmRequestDTO::from($this->all());
    }
}
