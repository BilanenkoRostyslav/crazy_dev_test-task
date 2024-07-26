<?php

namespace App\Http\Requests\FilmRequests;

use App\DataTransferObjects\FimDTO\FilmRequestDTO\PutFilmRequestDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use App\Http\Requests\BaseApiRequest;

class PutFilmRequest extends BaseApiRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'id'   => ['nullable'],
            'name' => ['nullable', 'string', 'min:3', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function getDTO(): PutFilmRequestDTO
    {
        return PutFilmRequestDTO::from($this->all());
    }
}
