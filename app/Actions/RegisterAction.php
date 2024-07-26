<?php

namespace App\Actions;

use App\DataTransferObjects\AuthDTO\RegisterUserDTO;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisterAction
{
    public function __construct(
        private readonly LoginUserAction $loginUserAction
    ) {
    }

    /**
     * @throws \Throwable
     */
    public function handle(RegisterUserDTO $dto): JsonResponse
    {
        User::create([
            'name'     => $dto->name,
            'email'    => $dto->email,
            'password' => Hash::make($dto->password),
        ]);

        return $this->loginUserAction->handle($dto->except('name')->toArray());
    }
}