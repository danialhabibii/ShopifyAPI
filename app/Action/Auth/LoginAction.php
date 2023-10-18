<?php

namespace App\Action\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginAction
{
    public function execute(array $data): string
    {
        $user = User::firstWhere('email', $data['email']);
        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect'],
            ]);
        }
        return $user->createToken(request()->header('User-Agent', 'Undefined'))->plainTextToken;
    }
}
