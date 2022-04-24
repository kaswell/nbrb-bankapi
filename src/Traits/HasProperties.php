<?php

namespace Kaswell\NbrbBankApi\Traits;

/**
 * Trait HasProperties
 * @package Kaswell\NbrbBankApi\Traits
 */
trait HasProperties
{
    use HasMutators;
    use HasAccessors;

    /**
     * @param string $property
     * @return bool
     */
    public function hasProperty(string $property): bool
    {
        return property_exists($this, $property);
    }

    /**
     * @param string $property
     * @param mixed $value
     */
    public function setProperty(string $property, mixed $value): void
    {
        if (!$this->hasProperty($property)) {
            return;
        }

        if ($this->hasMutator($property)){
            $mutator = $this->getMutator($property);
            $mutator($value);
        }
    }

    /**
     * @param string $property
     * @return mixed
     */
    public function getProperty(string $property): mixed
    {
        if (!$this->hasProperty($property)){
            return null;
        }

        if ($this->hasAccessor($property)){
            $accessor = $this->getAccessor($property);

            return $accessor();
        }

        return $this->{$property};
    }
}