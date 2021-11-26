<?php

declare(strict_types=1);

namespace App\Domains\Contact\DTO;

use App\Domains\Contact\ValueObjects\Create\CreateContactEmail;
use App\Domains\Contact\ValueObjects\Create\CreateContactName;
use App\Http\Requests\Contact\CreateContactRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreateContactDTO extends DataTransferObject
{
    public CreateContactName $name;

    public CreateContactEmail $email;

    public static function fromRequest(CreateContactRequest $request): self
    {
        return new self([
            'name' => new CreateContactName($request->name),
            'email' => new CreateContactEmail($request->email)
        ]);
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name->getValue(),
            'email' => $this->email->getValue()
        ];
    }
}
