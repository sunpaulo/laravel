<?php

namespace App\Models;

use App\Enums\RoleEnum;
use App\Services\UserRoleInterface;

class Manager extends User implements UserRoleInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getRole()
    {
        return Role::find(RoleEnum::CLIENT);
    }

}