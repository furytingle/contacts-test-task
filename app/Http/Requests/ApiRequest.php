<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ApiRequest extends FormRequest
{
    public function failedValidation(Validator $validator): JsonResponse
    {
        throw new ValidationException($validator, response()->json([
            'errors' => $validator->errors()
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }

    public function authorize(): bool
    {
        return true;
    }

    public function expectsJson(): bool
    {
        return true;
    }
}
