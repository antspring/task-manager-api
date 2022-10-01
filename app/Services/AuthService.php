<?php

namespace App\Services;

use App\Http\Repository\Interfaces\UserInterface;

class AuthService
{
    public function __construct(private UserInterface $repository){}

    public function createToken(array $validated)
    {
        $user = $this->repository->create($validated);

        $token = $user->createToken($user->name);

        return $token;
    }

    public function regenerateToken(array $validated)
    {
        $user = $this->repository->find($validated);

        $user->tokens()->delete();

        $token = $user->createToken($user->name);

        return $token;
    }
}
