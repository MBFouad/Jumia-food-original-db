<?php

namespace App\Countries;

class MoroccoPhone extends CountryFactory implements CountryInterface
{

    public function getCountryCode(): string
    {
        return '212';
    }

    public function getPhoneStatus(): string
    {
        return preg_match("~{$this->getPhoneRegex()}~", $this->phone) === 0 ? 'NOK' : 'OK';
    }

    public function getPhoneRegex(): string
    {
        return '\(212\)\ ?[5-9]\d{8}$';
    }
}
