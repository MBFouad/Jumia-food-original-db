<?php

namespace App\Countries;

class UgandaPhone extends CountryFactory implements CountryInterface
{
    public function getCountryCode(): string
    {
        return '256';
    }

    public function getPhoneStatus(): string
    {
        return preg_match("~{$this->getPhoneRegex()}~", $this->phone) === 0 ? 'NOK' : 'OK';
    }

    public function getPhoneRegex(): string
    {
        return '\(256\)\ ?\d{9}$';
    }
}
