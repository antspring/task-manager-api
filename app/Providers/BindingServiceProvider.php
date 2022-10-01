<?php

namespace App\Providers;

use App\Http\Repository\Interfaces\UserInterface;
use App\Http\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class BindingServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserInterface::class => UserRepository::class
    ];
}
