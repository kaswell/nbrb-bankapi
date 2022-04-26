<?php

namespace Kaswell\NbrbBankApi\Validators;

use Kaswell\NbrbBankApi\Abstracts\Validator;

class RatesValidator extends Validator
{
    /**
     * @param ...$request_data
     * @return bool
     */
    public function validate(...$request_data): bool
    {
        /*
         * parammode=0 – по внутреннему коду валюты
         * parammode=1 – по цифровому коду валюты (ИСО 4217)
         * parammode=2 – по буквенному коду валюты (ИСО 4217)
         */

        if (isset($request_data['periodicity']) && !in_array($request_data['periodicity'], [0, 1])){
            $this->isInvalid = true;
        }

        if (isset($request_data['id']) && !is_int($request_data['id'])) {
            $this->isInvalid = true;
        }

        return $this->isInvalid;
    }
}