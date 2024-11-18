<?php

declare(strict_types=1);

namespace Application;

class Validator
{
    public static function createValidationGroup(): ValidationGroup
    {
        return new ValidationGroup();
    }
}