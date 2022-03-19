<?php

namespace Tests\Unit;

use App\Countries\CameroonPhone;
use App\Countries\CountryFactory;
use App\Countries\EthiopiaPhone;
use App\Countries\MoroccoPhone;
use App\Countries\MozambiquePhone;
use App\Countries\UgandaPhone;
use App\Countries\UndefinedPhone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_cameroon_phone_instance()
    {
        $phone = '(237) 697151594';
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertInstanceOf(CameroonPhone::class, $country);
    }

    public function test_cameroon_phone_status()
    {
        $phone = '(237) 697151594';
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertStringContainsString($country->getPhoneStatus(), 'OK');

        $phone = '(237) 697151594R';

        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertStringContainsString($country->getPhoneStatus(), 'NOK');
    }

    public function test_ethiopia_phone_instance()
    {
        $phone = '(251) 914701723';
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertInstanceOf(EthiopiaPhone::class, $country);
    }

    public function test_ethiopia_phone_status()
    {
        $phone = '(251) 914701723';
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertStringContainsString($country->getPhoneStatus(), 'OK');

        $phone = '(251) 914701723R';

        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertStringContainsString($country->getPhoneStatus(), 'NOK');
    }

    public function test_morocco_phone_instance()
    {
        $phone = '(212) 698054317';
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertInstanceOf(MoroccoPhone::class, $country);
    }

    public function test_morocco_phone_status()
    {
        $phone = '(212) 698054317';
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertStringContainsString($country->getPhoneStatus(), 'OK');

        $phone = '(212) 698054317R';

        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertStringContainsString($country->getPhoneStatus(), 'NOK');
    }

    public function test_mozambique_phone_instance()
    {
        $phone = '(258) 849181828';
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertInstanceOf(MozambiquePhone::class, $country);
    }

    public function test_mozambique_phone_status()
    {
        $phone = '(258) 849181828';
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertStringContainsString($country->getPhoneStatus(), 'OK');

        $phone = '(258) 84918182R';

        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertStringContainsString($country->getPhoneStatus(), 'NOK');
    }

    public function test_uganda_phone_instance()
    {
        $phone = '(256) 775069443';
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertInstanceOf(UgandaPhone::class, $country);
    }

    public function test_uganda_phone_status()
    {
        $phone = '(256) 775069443';
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertStringContainsString($country->getPhoneStatus(), 'OK');

        $phone = '(256) 775069443R';

        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertStringContainsString($country->getPhoneStatus(), 'NOK');
    }

    public function test_undefined_phone_instance()
    {
        $phone = '(26) 775069443';
        $country = (new CountryFactory($phone))->getCountry(); #CountryInterface

        $this->assertInstanceOf(UndefinedPhone::class, $country);
    }

}
