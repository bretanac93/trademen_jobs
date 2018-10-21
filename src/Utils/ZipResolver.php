<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 21.10.18
 * Time: 15:19
 */

namespace App\Utils;


class ZipResolver
{
    private $z;

    public function __construct($country = 'DE')
    {
        $this->z = new \PragmaRX\ZipCode\ZipCode;
        $this->z->setCountry($country);
    }

    public function isValid($zip)
    {
        $data = $this->z->find($zip)->toArray();
        return $data['success'];
    }
}