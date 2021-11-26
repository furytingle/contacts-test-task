<?php

declare(strict_types=1);

namespace App\Http\Actions\Contact\Delete;

use App\Domains\Contact\Services\ContactService;
use App\Http\Controllers\Controller;
use App\Http\Resources\DeletedResource;
use App\Mail\ContactDeleted;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class DeleteContactAction extends Controller
{
    public function __construct(private ContactService $contactService)
    {
    }

    public function __invoke(Contact $contact): DeletedResource
    {
        $this->contactService->delete($contact);

        Mail::queue(new ContactDeleted($contact));

        return new DeletedResource([]);
    }
}
