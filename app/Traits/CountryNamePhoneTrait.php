<?php

namespace App\Traits;


use App\Countries\CountryFactory;

trait CountryNamePhoneTrait
{
    public function getCountryByPhone(string $phone): string
    {
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface
        return $country->getCountryName();
    }
}
