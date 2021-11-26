<?php

declare(strict_types=1);

namespace App\Domains\Common\ValueObjects;

class NonNullableInteger
{
    protected int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
