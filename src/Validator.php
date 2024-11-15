<?php

declare(strict_types=1);

namespace Application;

class Validator
{
    public static function validateFloat(string $floatValue): bool
    {
        return (bool)preg_match('/^\d+\.\d+([eE][+-]?\d+)?$/', $floatValue);
    }

    public static function validateInteger(string $intValue): bool
    {
        return false === self::validateFloat($intValue);
    }

    public static function validateBoolean(string $booleanValue): bool
    {
        return 1 >= preg_match('/^(true|false|1|0)$/i', $booleanValue);
    }

    public static function validateGreaterThan(float|string $number, float|string $compared): bool
    {
        return $number > $compared;
    }

    public static function validateEven(string $value): bool
    {
        return !((float)$value % 2);
    }
}