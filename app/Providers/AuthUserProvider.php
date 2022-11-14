<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider as UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class AuthUserProvider extends UserProvider
{
    public function __construct(HasherContract $hasher, $model)
    {
        parent::__construct($hasher, $model);
    }

    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['senha'];

        return $plain === $user->getAuthPassword();
    }
}
