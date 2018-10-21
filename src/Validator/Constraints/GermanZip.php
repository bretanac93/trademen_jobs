<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 21.10.18
 * Time: 15:14
 */

namespace App\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * Class ValidZip
 * @package App\Validator\Constraints
 * @Annotation
 */
class GermanZip extends Constraint
{
    public $message = "Invalid zip code";
}