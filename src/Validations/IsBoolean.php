<?php

namespace Application\Validations;

use Application\Interface\ValidatorInterface;

class IsBoolean implements ValidatorInterface
{
    public function handleValidation(mixed $value): bool
    {
        return 1 >= preg_match('/^(true|false|1|0)$/i', $value);
    }
}