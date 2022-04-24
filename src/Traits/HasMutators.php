<?php

namespace Kaswell\NbrbBankApi\Traits;

use Kaswell\NbrbBankApi\Helpers\Str;

/**
 * Trait HasMutators
 * @package Kaswell\NbrbBankApi\Traits
 */
trait HasMutators
{
    /**
     * @param string $property
     * @param mixed $value
     */
    public function __set(string $property, mixed $value): void
    {
        if ($this->hasMutator($property)){
            $mutator = $this->getMutator($property);

            $mutator($value);
        } else {
            $this->{$property} = $value;
        }
    }

    /**
     * @param string $property
     * @return bool
     */
    public function hasMutator(string $property): bool
    {
        return method_exists($this, $this->getMutator($property));
    }

    /**
     * @param string $property
     * @return string
     */
    public function getMutator(string $property): string
    {
        return 'set' . Str::studly($property).'Property';
    }
}