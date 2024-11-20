<?php

use Application\ValidationGroup;
use Application\Validations\IsEven;
use Application\Validations\IsGreaterThan;
use Application\Validations\IsInteger;
use PHPUnit\Framework\TestCase;

final class ValidationGroupIntegrationTest extends TestCase
{
    public function testValidationGroupIntegration(): void
    {
        $value = '204';

        $group = new ValidationGroup();
        $group->addValidation(new IsInteger())
              ->addValidation(new IsEven())
              ->addValidation(new IsGreaterThan(200));
        
        $this->assertTrue($group->handleValidate($value));
    }
}