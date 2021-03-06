<?php

namespace Kaswell\NbrbBankApi\Models\Traits;

/**
 * Trait HasPropertiesContract
 * @package Kaswell\NbrbBankApi\Traits
 */
trait HasProperties
{
    use HasPropertiesAlias;
    use HasMutators;
    use HasAccessors;

    /**
     * @param string $property
     * @return bool
     */
    public function hasProperty(string $property): bool
    {
        if ($this->hasPropertyAlias($property)) {
            $property = $this->getPropertyAlias($property);
        }

        return property_exists($this, $property);
    }

    /**
     * @param string $property
     * @param mixed $value
     */
    public function setProperty(string $property, mixed $value): void
    {
        if ($this->hasPropertyAlias($property)) {
            $property = $this->getPropertyAlias($property);
        }

        if (!$this->hasProperty($property)) {
            return;
        }

        if ($this->hasMutator($property)){
            $mutator = $this->getMutator($property);
            $this->$mutator($value);
        } else {
            $this->{$property} = $value;
        }
    }

    /**
     * @param string $property
     * @return mixed
     */
    public function getProperty(string $property): mixed
    {
        if ($this->hasPropertyAlias($property)) {
            $property = $this->getPropertyAlias($property);
        }

        if (!$this->hasProperty($property)){
            return null;
        }

        if ($this->hasAccessor($property)){
            $accessor = $this->getAccessor($property);

            return $this->$accessor();
        }

        return $this->{$property};
    }
}