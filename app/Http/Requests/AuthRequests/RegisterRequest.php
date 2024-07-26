<?php

namespace App\Http\Requests\AuthRequests;

use App\DataTransferObjects\AuthDTO\RegisterUserDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use App\Http\Requests\BaseApiRequest;

class RegisterRequest extends BaseApiRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string'],
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function getDTO(): RegisterUserDTO
    {
        return RegisterUserDTO::from($this->all());
    }
}
