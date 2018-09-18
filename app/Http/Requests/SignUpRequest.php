<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class SignUpRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:100|unique:' . User::getTableName(),
            'password' => 'required|string|min:3|confirmed',
            'role' => 'required|integer|in:' . RoleEnum::MANAGER . ',' . RoleEnum::CLIENT,
        ];
    }
}