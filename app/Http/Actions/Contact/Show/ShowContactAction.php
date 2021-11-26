<?php

declare(strict_types=1);

namespace App\Http\Actions\Contact\Show;

use App\Http\Controllers\Controller;
use App\Http\Resources\Contact\ContactResource;
use App\Models\Contact;

class ShowContactAction extends Controller
{
    public function __invoke(Contact $contact): ContactResource
    {
        return new ContactResource($contact);
    }
}
