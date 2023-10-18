<?php

namespace App\Http\Controllers;

use App\Action\Auth\ChangePasswordAction;
use App\Action\Auth\LoginAction;
use App\Action\Auth\LogoutAction;
use App\Action\Auth\RegisterAction;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\UserResource;
use App\Http\Resources\Auth\UserTokenResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['changePassword', 'logout']);
    }

    public function register(RegisterRequest $request, RegisterAction $registerAction)
    {
        $registerAction->execute($request->validated());
        return $this->created();
    }

    public function login(LoginRequest $request, LoginAction $loginAction)
    {
        $token = $loginAction->execute($request->validated());
        return $this->ok(
            UserTokenResource::make($token)
        );
    }

    public function changePassword(ChangePasswordRequest $request, ChangePasswordAction $changePasswordAction)
    {
        $changePasswordAction->execute($request->user(), $request->validated());
        $this->ok();
    }

    public function logout(Request $request, LogoutAction $logoutAction)
    {
        $logoutAction->execute($request->user());
        $this->ok();
    }
}
