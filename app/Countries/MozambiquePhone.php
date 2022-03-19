<?php

namespace App\Countries;

class MozambiquePhone extends CountryFactory implements CountryInterface
{
    public function getCountryCode(): string
    {
        return '258';
    }

    public function getPhoneStatus(): string
    {
        return preg_match("~{$this->getPhoneRegex()}~", $this->phone) === 0 ? 'NOK' : 'OK';
    }

    public function getPhoneRegex(): string
    {
        return '\(258\)\ ?[28]\d{7,8}$';
    }
}
