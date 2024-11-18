<?php

use Application\Validations\IsInteger;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass('Application\Validations\IsInteger')]
final class IsIntegerTest extends TestCase
{
    public $validationInteger;

    protected function setUp(): void
    {
        $this->validationInteger = new IsInteger();
    }

    public function testClassValidatorShouldValidateIsInteger(): void
    {
        $this->assertTrue($this->validationInteger->handleValidation('1'));
        $this->assertTrue($this->validationInteger->handleValidation('-2'));
    }

    public function testClassValidatorShouldValidateIsNotInteger(): void
    {
        $this->assertFalse($this->validationInteger->handleValidation('401.55'));
        $this->assertFalse($this->validationInteger->handleValidation('aaa'));
    }
}