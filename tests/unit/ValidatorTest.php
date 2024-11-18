<?php

use Application\Validations\IsEven;
use Application\Validations\IsGreaterThan;
use Application\Validations\IsInteger;
use Application\Validator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass('Application\ValidationGroup')]
final class ValidatorTest extends TestCase
{
    public function testValidationGroupWithNoValidations(): void
    {
        $validationGroup = Validator::createValidationGroup();

        $this->assertTrue($validationGroup->handleValidate('teste'));
    }
    
    public function testClassValidatorShouldAggregateMultipleValidations(): void
    {
        $validationGroup = Validator::createValidationGroup()
            ->addValidation(new IsInteger())
            ->addValidation(new IsGreaterThan(200))
            ->addValidation(new IsEven());

        $this->assertTrue($validationGroup->handleValidate('302'));
        $this->assertFalse($validationGroup->handleValidate('301'));
        $this->assertFalse($validationGroup->handleValidate('199'));
    }

    public function testClassValidatorShouldHandleEmptyValidationGroup(): void
    {
        $validationGroup = Validator::createValidationGroup();

        $this->assertTrue($validationGroup->handleValidate('teste'));
    }

    public function testClassValidatorShouldHandleSingleValidation(): void
    {
        $validationGroup = Validator::createValidationGroup()
            ->addValidation(new IsGreaterThan(10));

        $this->assertTrue($validationGroup->handleValidate('11'));
        $this->assertFalse($validationGroup->handleValidate('9'));
    }
}