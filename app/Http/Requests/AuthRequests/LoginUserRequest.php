<?php

namespace App\Http\Requests\AuthRequests;

use App\DataTransferObjects\AuthDTO\LoginUserDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use App\Http\Requests\BaseApiRequest;

class LoginUserRequest extends BaseApiRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function getDTO(): LoginUserDTO
    {
        return LoginUserDTO::from($this->all());
    }
}