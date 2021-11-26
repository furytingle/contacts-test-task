<?php

declare(strict_types=1);

namespace App\Http\Requests\Login;

use App\Http\Requests\ApiRequest;

/**
 * @property string $email
 * @property string $password
 */
class LoginRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:150', 'exists:users,email'],
            'password' => ['required', 'string', 'max:36']
        ];
    }
}
