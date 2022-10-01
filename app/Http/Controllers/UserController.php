<?php

namespace App\Http\Controllers;

use App\Http\Repository\UserRepository;
use App\Http\Requests\UpdateInfoRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserRepository $repository){}

    public function updateInfo(UpdateInfoRequest $request)
    {
        $validated = $request->validated();

        $this->repository->update($request->user(), $validated);

        return response(['message' => 'User updated', 'data' => $validated]);
    }
}
