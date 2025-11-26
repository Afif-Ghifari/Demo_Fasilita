<?php

namespace App\Services;

use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function attemptLogin($identifier, $password)
    {
        $user = Pengguna::where('username', $identifier)
                        ->orWhere('no_induk', $identifier)
                        ->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }
}
