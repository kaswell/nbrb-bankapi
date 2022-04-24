<?php

namespace Kaswell\NbrbBankApi\Abstracts;

use Kaswell\NbrbBankApi\Contracts\ArrayableContract;
use Kaswell\NbrbBankApi\Contracts\HasPropertiesContract;
use Kaswell\NbrbBankApi\Traits;

/**
 * Class Model
 * @package Kaswell\NbnbApi\Abstracts
 */
abstract class Model implements HasPropertiesContract, ArrayableContract
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
        $this->init($data);
    }

    /**
     * @param array $data
     * @return void
     */
    public function init(array $data): void
    {
        foreach ($data as $property => $value) {
            if ($this->hasProperty($property)) {
                $this->setProperty($property, $value);
            }
        }
    }
}