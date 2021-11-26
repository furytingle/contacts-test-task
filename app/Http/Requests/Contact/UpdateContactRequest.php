<?php

declare(strict_types=1);

namespace App\Http\Requests\Contact;

use App\Http\Requests\ApiRequest;

/**
 * @property string|null $name
 * @property string|null $email
 */
class UpdateContactRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'sometimes', 'string', 'max:120'],
            'email' => ['required', 'sometimes', 'string', 'email', 'max:120']
        ];
    }
}
