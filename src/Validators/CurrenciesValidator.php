<?php

namespace Kaswell\NbrbBankApi\Validators;

use Kaswell\NbrbBankApi\Abstracts\Validator;
use Exception;
use Kaswell\NbrbBankApi\Helpers\Str;

class CurrenciesValidator extends Validator
{
    /**
     * @param ...$request_data
     * @return bool
     */
    public function validate(...$request_data): bool
    {
        foreach ($request_data as $param => $value){
            $method = 'validate' . Str::studly($param);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }

        return $this->isInvalid;
    }

    /**
     * @param mixed $id
     * @return void
     */
    protected function validateId(mixed $id): void
    {
        if (!is_int($id)){
            $this->exception = new Exception('Invalid type ID.');
            $this->isInvalid = true;
        }
    }
}