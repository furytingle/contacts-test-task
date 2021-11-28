<?php

declare(strict_types=1);

namespace App\Http\Actions\Contact\Delete;

use App\Domains\Contact\Services\ContactServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\DeletedResource;
use App\Mail\ContactDeleted;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

final class DeleteContactAction extends Controller
{
    public function __construct(private ContactServiceInterface $contactService)
    {
    }

    public function __invoke(Contact $contact): DeletedResource
    {
        $this->contactService->delete($contact);

        Mail::queue(new ContactDeleted($contact));

        return new DeletedResource([]);
    }
}
