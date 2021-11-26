<?php

declare(strict_types=1);

namespace App\Http\Requests\Contact;

use App\Http\Requests\ApiRequest;

/**
 * @property string $name
 * @property string $email
 */
class CreateContactRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'string', 'email', 'max:120']
        ];
    }
}
