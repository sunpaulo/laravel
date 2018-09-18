<?php

namespace App\Services\Logical;

use App\Enums\RoleEnum;
use App\Http\Requests\SignUpRequest;
use App\Models\User;

class UserService
{
    public static function createFromRequest(SignUpRequest $request)
    {
        $role = $request->get('role', RoleEnum::CLIENT);

        $user = new User($request->all());
        $user->save();

        $user->roles()->attach($role);

        return $user;
    }
}