<?php

namespace Kaswell\NbrbBankApi\Enums;

use Kaswell\NbrbBankApi\Helpers\Str;

enum Request
{
    case Currencies;
    case Rates;

    /**
     * @return string
     */
    public function path(): string
    {
        return match ($this) {
            Request::Currencies => Str::lower(Request::Currencies->name),
            Request::Rates => Str::lower(Request::Rates->name),
        };
    }
}