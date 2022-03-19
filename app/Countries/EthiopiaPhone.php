<?php

namespace App\Countries;

class EthiopiaPhone extends CountryFactory implements CountryInterface
{
    public function getCountryCode(): string
    {
        return '251';
    }

    public function getPhoneStatus(): string
    {
        return preg_match("~{$this->getPhoneRegex()}~", $this->phone) === 0 ? 'NOK' : 'OK';
    }

    public function getPhoneRegex(): string
    {
        return '\(251\)\ ?[1-59]\d{8}$';
    }
}
