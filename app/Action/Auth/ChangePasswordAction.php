<?php

namespace App\Action\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ChangePasswordAction
{
    public function execute(User $user, $data)
    {
        if (!Hash::check($data['old_password'], $user->password)) {
            throw ValidationException::withMessages([
                'old_password' => ['old password Invalid'],
            ]);
        }
        $user->update([
            'password' => $data['new_password'],
        ]);
    }
}
