<?php

namespace App\Actions;

use Illuminate\Support\Facades\Auth;

class LogoutAction
{
    public function handle(): \Illuminate\Http\JsonResponse
    {
        $token = Auth::user()->currentAccessToken();
        $token->delete();

        return response()->json('Logged out');
    }
}