<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ChangePassword
{
    public function handle(string $current_password, string $new_password): void
    {
        // get model user login
        $user = User::findOrFail(auth()->user()->id);

        // check current password same with database
        if (!Hash::check($current_password, $user->password)) {
            throw ValidationException::withMessages(['wrong_password' => 'Password Salah!']);
        }

        // update user password
        $user->password = Hash::make($new_password);
        $user->save();

        return;
    }
}
