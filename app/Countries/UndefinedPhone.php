<?php

namespace App\Countries;

class UndefinedPhone extends CountryFactory implements CountryInterface
{
    public function getCountryCode(): string
    {
        return 'N/A';
    }

    public function getPhoneStatus(): string
    {
        return 'NOK';
    }

    public function getPhoneRegex(): string
    {
        return '';
    }
}
