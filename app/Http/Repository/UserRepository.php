<?php

namespace App\Http\Repository;

use App\Events\UserCreated;
use App\Http\Repository\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserRepository implements UserInterface
{
    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);

        $user = User::query()->create($data);

        return $user;
    }

    public function find(array $data)
    {
        $user = User::query()->where('email', $data['email'])->first();

        if (Hash::check($data['password'], $user->password)){
            return $user;
        }

        throw new HttpException(422, 'Wrong password');
    }

    public function update(User $user, array $data)
    {
        $user->update($data);
    }
}
