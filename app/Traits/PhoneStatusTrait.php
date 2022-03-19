<?php

namespace App\Traits;


use App\Countries\CountryFactory;

trait PhoneStatusTrait
{
    public function getStatusByPhone(string $phone): string
    {
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface
        return $country->getPhoneStatus();
    }
}
