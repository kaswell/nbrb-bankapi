<?php

namespace Kaswell\NbrbBankApi;

use Exception;
use Kaswell\NbrbBankApi\Abstracts\Validator;
use Kaswell\NbrbBankApi\Enums\Request;

class ValidatorFactory
{
    /**
     * @param Request $request
     * @return Validator
     * @throws Exception
     */
    public static function make(Request $request): Validator
    {
        $validator = __NAMESPACE__ . '\\' . 'Validators' . '\\' . $request->name . 'Validator';

        if (class_exists($validator)) {
            return new $validator();
        }

        throw new Exception('Unknown validator.');
    }
}