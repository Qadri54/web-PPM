<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string | array $routeMiddleware = ['role:super_admin'];
    protected static string $resource = UserResource::class;
}
