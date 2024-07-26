<?php

namespace App\DataTransferObjects\AuthDTO;

use Spatie\LaravelData\Data;

class RegisterUserDTO extends Data
{
    public string $name;
    public string $email;
    public string $password;
}