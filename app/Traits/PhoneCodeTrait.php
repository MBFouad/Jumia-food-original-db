<?php

namespace App\Traits;


use App\Countries\CountryFactory;

trait PhoneCodeTrait
{
    public function getCountryCodeByPhone(string $phone): string
    {
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface
        return $country->getCountryCode() == 'N/A' ? 'N/A' : '+' . $country->getCountryCode();
    }
}
