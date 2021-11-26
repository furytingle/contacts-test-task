<?php

declare(strict_types=1);

namespace App\Http\Requests\Contact;

use App\Http\Requests\ApiRequest;

/**
 * @property int|null $page
 * @property int|null $per_page
 */
class GetContactsRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'page' => ['required', 'sometimes', 'integer', 'min:1'],
            'per_page' => ['required', 'sometimes', 'integer', 'min:1', 'max:50']
        ];
    }
}
