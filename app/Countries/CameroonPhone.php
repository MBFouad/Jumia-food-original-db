<?php

namespace App\Countries;

class CameroonPhone extends CountryFactory implements CountryInterface
{
    public function getCountryCode(): string
    {
        return '237';
    }

    public function getPhoneStatus(): string
    {
        return preg_match("~{$this->getPhoneRegex()}~", $this->phone) === 0 ? 'NOK' : 'OK';
    }

    public function getPhoneRegex(): string
    {
        return '\(237\)\ ?[2368]\d{7,8}$';
    }
}
