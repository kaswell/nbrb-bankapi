<?php

namespace Kaswell\NbrbBankApi\Enums;

use Kaswell\NbrbBankApi\Helpers\Str;

enum Request
{
    case Currencies;
    case Currency;
    case Rates;
    case Rate;

    /**
     * @return string
     */
    public function path(): string
    {
        return match ($this) {
            Request::Currencies => Str::lower(Request::Currencies->name),
            Request::Currency => Str::lower(Request::Currencies->name),
            Request::Rates => Str::lower(Request::Rates->name),
            Request::Rate => Str::lower(Request::Rates->name),
        };
    }
}