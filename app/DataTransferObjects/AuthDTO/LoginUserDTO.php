<?php

namespace App\DataTransferObjects\AuthDTO;

use Spatie\LaravelData\Data;

class LoginUserDTO extends Data
{
    public string $email;
    public string $password;
}