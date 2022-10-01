<?php
namespace App\Http\Repository\Interfaces;

use App\Models\User;

interface UserInterface
{
    public function create(array $data);

    public function find(array $data);

    public function update(User $user, array $data);
}
