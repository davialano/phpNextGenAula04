<?php

use Application\Validations\IsBoolean;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass('Application\Validations\IsBoolean')]
final class IsBooleanTest extends TestCase
{
    public $validationBool;

    protected function setUp(): void
    {
        $this->validationBool = new IsBoolean();
    }

    public function testClassValidatorShouldValidateIsBoolean(): void
    {
        $this->assertTrue($this->validationBool->handleValidation('true'));
        $this->assertTrue($this->validationBool->handleValidation(1));
        $this->assertTrue($this->validationBool->handleValidation('false'));
        $this->assertTrue($this->validationBool->handleValidation(0));
    }
}