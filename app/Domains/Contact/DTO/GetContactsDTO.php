<?php

declare(strict_types=1);

namespace App\Domains\Contact\DTO;

use App\Domains\Contact\ValueObjects\GetContacts\PageNumber;
use App\Domains\Contact\ValueObjects\GetContacts\PerPageNumber;
use App\Http\Requests\Contact\GetContactsRequest;
use Spatie\DataTransferObject\DataTransferObject;

class GetContactsDTO extends DataTransferObject
{
    private const PAGE = 1;

    private const PER_PAGE = 10;

    public PageNumber $page;

    public PerPageNumber $perPage;

    public static function fromRequest(GetContactsRequest $request): self
    {
        return new self([
            'page' => new PageNumber($request->page ? (int)$request->page : self::PAGE),
            'perPage' => new PerPageNumber($request->per_page ? (int)$request->per_page : self::PER_PAGE)
        ]);
    }
}
