<?php

namespace App\Models;

use App\Enums\RoleEnum;
use App\Services\UserRoleInterface;

class Client extends User implements UserRoleInterface
{
    public function getRole()
    {
        return Role::find(RoleEnum::CLIENT);
    }
}