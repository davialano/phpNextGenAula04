<?php

namespace Application\Validations;

use Application\Interface\ValidatorInterface;

class IsInteger implements ValidatorInterface
{
    public function handleValidation(mixed $value): bool
    {
        return is_numeric($value) && (string)(int)$value === (string)$value;
    }
}