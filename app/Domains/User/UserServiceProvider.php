<?php

namespace App\Domains\User;

use App\Domains\User\Filament\UserResource;
use Filament\PluginServiceProvider;

class UserServiceProvider extends PluginServiceProvider
{
    public static string $name = 'user_domain';

    protected array $resources = [
        UserResource::class,
    ];
}
