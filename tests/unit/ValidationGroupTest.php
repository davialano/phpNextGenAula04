<?php

use Application\Interface\ValidatorInterface;
use Application\ValidationGroup;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass('Application\ValidationGroup')]
final class ValidationGroupTest extends TestCase
{
    public function testAddValidation(): void
    {
        $mockValidation = $this->createMock(ValidatorInterface::class);

        $group = new ValidationGroup();
        $result = $group->addValidation($mockValidation);

        $this->assertInstanceOf(ValidationGroup::class, $result);
        $this->assertNotEmpty($group);
    }

    public function testHandleValidateWithAllValidationsPassing(): void
    {
        $mockValidation1 = $this->createMock(ValidatorInterface::class);
        $mockValidation1->method('handleValidation')->willReturn(true);

        $mockValidation2 = $this->createMock(ValidatorInterface::class);
        $mockValidation2->method('handleValidation')->willReturn(true);

        $group = new ValidationGroup();
        $group->addValidation($mockValidation1)
              ->addValidation($mockValidation2);

        $this->assertTrue($group->handleValidate('teste'));
    }

    public function testHandleValidateWithOneValidationFailing(): void
    {
        $mockValidation1 = $this->createMock(ValidatorInterface::class);
        $mockValidation1->method('handleValidation')->willReturn(true);

        $mockValidation2 = $this->createMock(ValidatorInterface::class);
        $mockValidation2->method('handleValidation')->willReturn(false);

        $group = new ValidationGroup();
        $group->addValidation($mockValidation1)
              ->addValidation($mockValidation2);

        $this->assertFalse($group->handleValidate('teste'));
    }

    public function testHandleValidateWithMultipleValidations(): void
    {
        $mockValidation1 = $this->createMock(ValidatorInterface::class);
        $mockValidation1->method('handleValidation')->willReturn(true);

        $mockValidation2 = $this->createMock(ValidatorInterface::class);
        $mockValidation2->method('handleValidation')->willReturn(false);

        $mockValidation3 = $this->createMock(ValidatorInterface::class);
        $mockValidation3->method('handleValidation')->willReturn(true);

        $group = new ValidationGroup();
        $group->addValidation($mockValidation1)
            ->addValidation($mockValidation2)
            ->addValidation($mockValidation3);

        $this->assertFalse($group->handleValidate('value'));
    }
}