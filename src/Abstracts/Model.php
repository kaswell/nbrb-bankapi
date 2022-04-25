<?php

namespace Kaswell\NbrbBankApi\Abstracts;

use Kaswell\NbrbBankApi\Contracts\ArrayableContract;
use Kaswell\NbrbBankApi\Contracts\HasPropertiesAliasContract;
use Kaswell\NbrbBankApi\Contracts\HasPropertiesContract;
use Kaswell\NbrbBankApi\Contracts\ModelContract;
use Kaswell\NbrbBankApi\Traits;

/**
 * Class Model
 * @package Kaswell\NbnbApi\Abstracts
 */
abstract class Model implements ModelContract, HasPropertiesContract, HasPropertiesAliasContract, ArrayableContract
{
    use Traits\HasProperties;
    use Traits\Arrayable;

    /**
     * Model constructor.
     * @param ...$data
     * @return void
     */
    public function __construct(...$data)
    {
        if (array_is_list($data)){
            if (is_array($data[0]) && !array_is_list($data[0])){
                $data = $data[0];
            }
        }
        $this->init($data);
    }

    /**
     * @param array $data
     * @return void
     */
    public function init(array $data = []): void
    {
        foreach ($data as $property => $value) {
            if ($this->hasProperty($property)) {
                $this->setProperty($property, $value);
            }
        }
    }
}