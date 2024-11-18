<?php

use Application\Validations\IsFloat;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass('Application\Validations\IsFloat')]
final class IsFloatTest extends TestCase
{
    public $validationFloat;

    protected function setUp(): void
    {
        $this->validationFloat = new IsFloat();
    }

    public function testClassValidatorShouldValidateIsFloat(): void
    {
        $this->assertTrue($this->validationFloat->handleValidation('178.55'));
        $this->assertTrue($this->validationFloat->handleValidation('0.045'));
    }

    public function testClassValidatorShouldValidateIsNotFloat(): void
    {
        $this->assertFalse($this->validationFloat->handleValidation('1785'));
        $this->assertFalse($this->validationFloat->handleValidation('45'));
    }
}