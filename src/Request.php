<?php

namespace Kaswell\NbrbBankApi;

enum Request
{
    case Currencies;
    case Currency;
    case Rates;
    case Rate;

    /**
     * @return string
     */
    public function type(): string
    {
        return match ($this) {
            Request::Currencies => StrHelper::lower(Request::Currencies->name),
            Request::Currency => StrHelper::lower(Request::Currency->name),
            Request::Rates => StrHelper::lower(Request::Rates->name),
            Request::Rate => StrHelper::lower(Request::Rate->name),
        };
    }
}