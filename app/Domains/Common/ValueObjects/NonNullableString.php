<?php

declare(strict_types=1);

namespace App\Domains\Common\ValueObjects;

class NonNullableString
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
