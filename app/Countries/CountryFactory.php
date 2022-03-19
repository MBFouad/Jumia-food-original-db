<?php


namespace App\Countries;


class CountryFactory
{
    public $phone;
    private $country_code;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
        $this->country_code = $this->_getPhoneCode();
    }

    public function getCountry(): CountryInterface
    {
        $country = 'App\Countries\\' . $this->_handleCountry($this->country_code) . 'Phone';
        return (new $country($this->phone));
    }

    public function getCountryName(): string
    {
        return str_replace('Phone', '', (new \ReflectionClass($this))->getShortName());
    }

    private function _getPhoneCode(): ?string
    {
        preg_match('~\((\d+)\)\ ?.*$~', $this->phone, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    }

    private function _handleCountry(?string $phone_code): string
    {
        $rules = [
            '237' => 'Cameroon',
            '251' => 'Ethiopia',
            '212' => 'Morocco',
            '258' => 'Mozambique',
            '256' => 'Uganda'
        ];

        return isset($rules[$phone_code]) ? $rules[$phone_code] : 'Undefined';
    }

}
