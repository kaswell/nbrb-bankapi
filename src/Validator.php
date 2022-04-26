<?php

namespace Kaswell\NbrbBankApi;

use Kaswell\NbrbBankApi\Enums\Request;

class Validator
{
    /**
     * @var bool
     */
    protected bool $isInvalid = false;

    /**
     * @param Request $request
     * @param ...$request_data
     * @return bool
     */
    public static function make(Request $request, ...$request_data): bool
    {
        $validator = new Validator();

        return $validator->validate($request, $request_data);
    }

    /**
     * @param Request $request
     * @param array $request_data
     * @return bool
     */
    public function validate(Request $request, array $request_data): bool
    {
        $validator = 'validate'. $request->name;

        $this->$validator($request_data);

        return $this->isInvalid;
    }

    /**
     * @param array $request_data
     * @return void
     */
    public function validateCurrencies(array $request_data): void
    {
        if (isset($request_data['id']) && !is_int($request_data['id'])){
            $this->isInvalid = true;
        }
    }

    /**
     * @param array $request_data
     * @return void
     */
    public function validateRates(array $request_data): void
    {
        if (isset($request_data['periodicity']) && !in_array($request_data['periodicity'], [0, 1])){
            $this->isInvalid = true;
        }

        if (isset($request_data['id']) && !is_int($request_data['id'])) {
            $this->isInvalid = true;
        }
    }
}