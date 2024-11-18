<?php

namespace Application\Validations;

use Application\Interface\ValidatorInterface;

class IsFloat implements ValidatorInterface
{
    public function handleValidation(mixed $value): bool
    {
        return (bool)preg_match('/^\d+\.\d+([eE][+-]?\d+)?$/', $value);
    }
}