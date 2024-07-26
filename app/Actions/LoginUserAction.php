<?php

namespace App\Actions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginUserAction
{
    /**
     * @throws \Throwable
     */
    public function handle(array $data): JsonResponse
    {
        $login = Auth::attempt($data);
        throw_unless($login, new AuthenticationException());
        $user  = Auth::user();
        $token = $user->createToken('token')->plainTextToken;

        return response()->json(['token' => $token]);
    }
}