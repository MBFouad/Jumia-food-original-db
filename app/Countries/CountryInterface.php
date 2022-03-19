<?php


namespace App\Countries;


interface CountryInterface
{
    public function getCountryName(): string;

    public function getCountryCode(): string;

    public function getPhoneStatus(): string;

    public function getPhoneRegex(): string;
}
