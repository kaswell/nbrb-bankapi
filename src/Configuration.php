<?php

namespace Kaswell\NbrbBankApi;

use Kaswell\NbrbBankApi\Contracts\ConfigurationContract;

/**
 * Class Configuration
 * @package Kaswell\NbrbBankApi
 */
class Configuration implements ConfigurationContract
{
    public function __construct()
    {

    }

    public function url(): string
    {
        return 'https://www.nbrb.by/api/exrates/';
    }
}