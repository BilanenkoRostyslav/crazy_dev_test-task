<?php

namespace App\Http\Requests\FilmRequests;

use App\DataTransferObjects\FimDTO\FilmRequestDTO\DeleteRequestDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use App\Http\Requests\BaseApiRequest;

class DeleteFilmRequest extends BaseApiRequest implements RequestInterfaceDTO
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

    public function getDTO()
    {
        return DeleteRequestDTO::from($this->all());
    }
}
