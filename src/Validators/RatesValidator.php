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
        if (isset($request_data['periodicity']) && !in_array($request_data['periodicity'], [0, 1])){
            $this->isInvalid = true;
        }

        if (isset($request_data['id']) && !is_int($request_data['id'])) {
            $this->isInvalid = true;
        }

        return $this->isInvalid;
    }
}