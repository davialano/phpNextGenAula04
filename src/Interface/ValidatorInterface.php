<?php

namespace Application\Interface;

interface ValidatorInterface
{
    public function handleValidation(mixed $value): bool;
}