<?php

namespace Application;

use Application\Interface\ValidatorInterface;

class ValidationGroup
{
    private array $validations = [];

    public function addValidation(ValidatorInterface $validation): self
    {
        $this->validations[] = $validation;
        return $this;
    }

    public function handleValidate(mixed $value): bool
    {
        foreach ($this->validations as $validation) {
            if (!$validation->handleValidation($value)) {
                return false;
            }
        }
        return true;
    }
}