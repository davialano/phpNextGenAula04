<?php

use Application\Validations\IsGreaterThan;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass('Application\Validations\IsGreaterThan')]
final class IsGreaterThanTest extends TestCase
{
    public $validationGreaterThan;

    protected function setUp(): void
    {
        $this->validationGreaterThan = new IsGreaterThan(100);
    }

    public function testClassValidatorShouldValidateIsGreaterThan(): void
    {
        $this->assertTrue($this->validationGreaterThan->handleValidation('101'));
        $this->assertTrue($this->validationGreaterThan->handleValidation('1000'));
    }
    
    public function testClassValidatorShouldValidateIsNotGreaterThan(): void
    {
        $this->assertFalse($this->validationGreaterThan->handleValidation('99'));
        $this->assertFalse($this->validationGreaterThan->handleValidation('1'));
    }
}