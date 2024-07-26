<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\LoginUserAction;
use App\Actions\LogoutAction;
use App\Actions\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequests\LoginUserRequest;
use App\Http\Requests\AuthRequests\RegisterRequest;
use Throwable;

class AuthController extends Controller
{
    /**
     * @throws Throwable
     */
    public function register(RegisterRequest $request, RegisterAction $action)
    {
        return $action->handle($request->getDTO());
    }

    /**
     * @throws Throwable
     */
    public function login(LoginUserRequest $request, LoginUserAction $action)
    {
        return $action->handle($request->getDTO()->toArray());
    }

    public function logout(LogoutAction $action)
    {
        return $action->handle();
    }
}
