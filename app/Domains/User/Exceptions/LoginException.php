<?php

declare(strict_types=1);

namespace App\Domains\User\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginException extends \Exception
{
    public function render(Request $request): JsonResponse
    {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
}
