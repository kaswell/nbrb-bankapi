<?php

namespace Kaswell\NbrbBankApi\Validators;

use Kaswell\NbrbBankApi\Abstracts\Validator;
use Kaswell\NbrbBankApi\Helpers\Str;
use DateTime;

class RatesValidator extends Validator
{
    /**
     * @var array
     */
    protected array $request_data = [];

    /**
     * @param ...$request_data
     * @return bool
     */
    public function validate(...$request_data): bool
    {
        $this->request_data = $request_data;

        foreach ($request_data as $param => $value) {
            $method = 'validate' . Str::studly($param);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }

        if (isset($request_data['periodicity']) && !in_array($request_data['periodicity'], [0, 1])) {
            $this->isInvalid = true;
        }

        if (isset($request_data['id']) && !is_int($request_data['id'])) {
            $this->isInvalid = true;
        }

        return $this->isInvalid;
    }

    /**
     * @param mixed $id
     * @return void
     */
    protected function validateId(mixed $id): void
    {
        $mode = $this->request_data['parammode'];
        $this->validateParammode($mode);

        $this->validateIdByMode($id, $mode);
    }


    protected function validateParammode(mixed $parammode): void
    {
        if (!is_int($parammode) || !in_array($parammode, [0, 1, 2])) {
            $this->invalid('Invalid parammode.');
        }
    }

    /**
     * @param mixed $ondate
     * @return void
     */
    protected function validateOndate(mixed $ondate): void
    {
        if ($ondate !== null) {
            $date = DateTime::createFromFormat('Y-n-j', $ondate);
            if (!($date instanceof DateTime) || is_bool($date) || $date === false) {
                $this->invalid('Invalid ondate.');
            }
        }
    }

    /**
     * @param mixed $id
     * @param int $mode
     * @return void
     *
     */
    protected function validateIdByMode(mixed $id, int $mode): void
    {
        $invalid = function (){
            $this->invalid('Invalid type ID.');
        };

        if ($mode !== 2) {
            if (!is_int($id)) $invalid();
        } else {
            if (!is_string($id)) $invalid();
        }
    }
}