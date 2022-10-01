<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTokenRequest;
use App\Http\Requests\RegenerateTokenRequest;
use App\Services\AuthService;

class AuthController extends Controller
{

    public function __construct(private AuthService $service){}

    public function createToken(CreateTokenRequest $request)
    {
        $validated = $request->validated();

        $token = $this->service->createToken($validated);

        return response(['message' => 'User registered', 'token' => $token->plainTextToken]);
    }

    public function regenerateToken(RegenerateTokenRequest $request)
    {
        $validated = $request->validated();

        $token = $this->service->regenerateToken($validated);

        return response(['message' => 'User logged in', 'token' => $token->plainTextToken]);
    }
}
