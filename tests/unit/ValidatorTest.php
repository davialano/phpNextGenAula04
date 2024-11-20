<?php

use Application\ValidationGroup;
use Application\Validator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass('Application\Validator')]
final class ValidatorTest extends TestCase
{
    public function testValidationGroupWithNoValidations(): void
    {
        $validationGroup = Validator::createValidationGroup();

        $this->assertInstanceOf(ValidationGroup::class, $validationGroup);
    }
}