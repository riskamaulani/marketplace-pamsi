<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\UserStoreRequest;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\UserChangePasswordRequest;

class ChangePassword
{
    public function handle($request, $user): void
    {
        // check current password same with database
        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages(['wrong_password' => 'Password Salah!']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return;
    }
}
