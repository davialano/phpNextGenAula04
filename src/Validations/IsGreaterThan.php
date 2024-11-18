<?php

namespace Application\Validations;

use Application\Interface\ValidatorInterface;

class IsGreaterThan implements ValidatorInterface
{
    private float|int $compared;

    public function __construct(float|int $compared)
    {
        $this->compared = $compared;
    }

    public function handleValidation(mixed $value): bool
    {
        return is_numeric($value) && $value > $this->compared;
    }
}