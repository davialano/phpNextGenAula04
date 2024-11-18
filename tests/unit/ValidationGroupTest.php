<?php

use Application\Validations\IsEven;
use Application\Validations\IsGreaterThan;
use Application\Validations\IsInteger;
use Application\Validator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass('Application\ValidationGroup')]
final class ValidationGroupTest extends TestCase
{
    public function testValidationGroupWithNoValidations(): void
    {
        $validationGroup = Validator::createValidationGroup();

        $this->assertTrue($validationGroup->handleValidate('teste'));
    }

    public function testValidationGroupWithSingleValidation(): void
    {
        $validationGroup = Validator::createValidationGroup()
            ->addValidation(new IsGreaterThan(10));

        $this->assertTrue($validationGroup->handleValidate('11'));
        $this->assertFalse($validationGroup->handleValidate('9'));
    }

    public function testValidationGroupWithMultipleValidations(): void
{
    $validationGroup = Validator::createValidationGroup()
        ->addValidation(new IsInteger())
        ->addValidation(new IsGreaterThan(200))
        ->addValidation(new IsEven());

    $this->assertTrue($validationGroup->handleValidate('302'));
    $this->assertFalse($validationGroup->handleValidate('301'));
    $this->assertFalse($validationGroup->handleValidate('199'));
    $this->assertFalse($validationGroup->handleValidate('302.1'));
}

}