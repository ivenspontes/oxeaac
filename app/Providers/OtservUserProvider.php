<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider as UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class OtservUserProvider extends UserProvider
{
    public function validateCredentials(UserContract $user, array $credentials)
    {
        return (sha1($credentials['password']) == $user->getAuthPassword());
    }
}
