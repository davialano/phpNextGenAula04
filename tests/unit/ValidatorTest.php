<?php

use Application\Validator;
use PHPUnit\Framework\TestCase;

final class ValidatorTest extends TestCase
{
    public function testClassValidatorShouldValidateIsInteger(): void
    {
        $result = Validator::validateInteger('1');
        $this->assertTrue($result);

        $result = Validator::validateInteger('-2');
        $this->assertTrue($result);
    }

    public function testClassValidatorShouldValidateIsNotInteger(): void
    {
        $result = Validator::validateInteger('123.11');
        $this->assertFalse($result);
    }

    public function testClassValidatorShouldValidateMultipleValidations(): void
    {
        $value = '302';
        $result1 = Validator::validateInteger($value);
        $result2 = Validator::validateGreaterThan($value, 200);
        $result3 = Validator::validateEven($value);

        $this->assertTrue($result1 && $result2 && $result3);
    }

    public function notATestClassValidatorShouldAggregateMultipleValidations(): void
    {
        $validator = new Validator();

        $validationGroup = $validator->addValidation(new IsInteger())
                                     ->addValidation(new IsGreaterThan())
                                     ->addValidation(new IsEven());
        
        $result = $validationGroup->validate(302);

        $this->assertTrue($result);
    }
}