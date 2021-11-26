<?php

declare(strict_types=1);

namespace App\Domains\Contact\DTO;

use App\Domains\Contact\ValueObjects\Update\UpdateContactEmail;
use App\Domains\Contact\ValueObjects\Update\UpdateContactName;
use App\Http\Requests\Contact\UpdateContactRequest;
use Spatie\DataTransferObject\DataTransferObject;

final class UpdateContactDTO extends DataTransferObject
{
    public UpdateContactName $name;

    public UpdateContactEmail $email;

    public static function fromRequest(UpdateContactRequest $request): self
    {
        return new self([
            'name' => new UpdateContactName($request->name),
            'email' => new UpdateContactEmail($request->email)
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
