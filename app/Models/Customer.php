<?php

namespace App\Models;

use App\Traits\CountryNamePhoneTrait;
use App\Traits\PhoneCodeTrait;
use App\Traits\PhoneStatusTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory, CountryNamePhoneTrait, PhoneCodeTrait, PhoneStatusTrait;

    protected $table = 'customer';
    protected $fillable = ['name', 'phone'];

    public function country(): Attribute
    {
        return new Attribute(fn() => $this->getCountryByPhone($this->phone));
    }

    public function countryCode(): Attribute
    {
        return new Attribute(fn() => $this->getCountryCodeByPhone($this->phone));
    }

    public function phoneOnly(): Attribute
    {
        preg_match('~\((\d+)\)\ ?(.*)$~', $this->phone, $matches);
        return new Attribute(fn() => $matches[2] ?? 'N/A');
    }
    public function phoneStatus(): Attribute
    {
        return new Attribute(fn() => $this->getStatusByPhone($this->phone));
    }
}

