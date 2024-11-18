<?php

namespace Application\Validations;

use Application\Interface\ValidatorInterface;

class IsEven implements ValidatorInterface
{
    public function handleValidation(mixed $value): bool
    {
        return is_numeric($value) && ((int)$value % 2 === 0);
    }
}