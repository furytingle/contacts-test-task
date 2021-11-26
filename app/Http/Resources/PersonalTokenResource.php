<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Sanctum\NewAccessToken;

/**
 * @mixin NewAccessToken
 */
class PersonalTokenResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'access_token' => $this->plainTextToken
        ];
    }
}
