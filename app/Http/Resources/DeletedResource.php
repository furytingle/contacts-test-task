<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeletedResource extends JsonResource
{
    public function toArray($request)
    {
        return ['deleted' => true];
    }
}
