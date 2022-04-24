<?php

namespace Kaswell\NbrbBankApi\Abstracts;

use Kaswell\NbrbBankApi\Contracts\HasAttributes;
use Kaswell\NbrbBankApi\Traits;

/**
 * Class Model
 * @package Kaswell\NbnbApi\Abstracts
 */
abstract class Model implements HasAttributes
{
    use Traits\HasAttributes;

    /**
     * Model constructor.
     * @param ...$data
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
        foreach ($data as $key => $value) {
            if ($this->hasAttribute($key)) {
                $this->setAttribute($key, $value);
            }
        }
    }

    /**
     * @param string $property
     * @return bool
     */
    protected function hasSetter(string $property): bool
    {
        $method = $this->getPropertySetterMethodName($property);

        return method_exists(static::class, $method);
    }

    /**
     * @param string $property
     * @return string
     */
    protected function getPropertySetterMethodName(string $property): string
    {
        return 'set' . ucfirst($property) . 'Attribute';
    }

    protected function setModelProperty(string $property, mixed $value)
    {
        if ($this->hasSetter($property)){
            $method = $this->getPropertySetterMethodName($property);
            $method($value);
        } else {
            $this->{$property} = $value;
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}