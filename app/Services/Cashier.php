<?php

namespace App\Services;

require_once dirname(__FILE__, 3).'/app/Omise/lib/Omise.php';

class Cashier
{
    public static function charge(array $data)
    {
        return \OmiseCharge::create($data);
    }
}
