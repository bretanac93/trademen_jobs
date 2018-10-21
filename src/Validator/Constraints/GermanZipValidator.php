<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 21.10.18
 * Time: 15:16
 */

namespace App\Validator\Constraints;

use App\Utils\ZipResolver;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class GermanZipValidator extends ConstraintValidator
{

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint)
    {
        $zipResolver = new ZipResolver;
        if ($value === null || $value === '') {
            return;
        }
        if (!is_string($value)) {
            throw new UnexpectedTypeException($value, 'string');
        }
        if (!$zipResolver->isValid($value)) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}