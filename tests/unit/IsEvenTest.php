<?php

use Application\Validations\IsEven;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass('Application\Validations\IsEven')]
final class IsEvenTest extends TestCase
{
    public $validationEven;

    protected function setUp(): void
    {
        $this->validationEven = new IsEven();
    }
    public function testClassValidatorShouldValidateIsEven(): void
    {
        $this->assertTrue($this->validationEven->handleValidation('2'));
        $this->assertTrue($this->validationEven->handleValidation('10'));
    }

    public function testClassValidatorShouldValidateIsNotEven(): void
    {
        $this->assertFalse($this->validationEven->handleValidation('3'));
        $this->assertFalse($this->validationEven->handleValidation('aaaaa'));
    }
}