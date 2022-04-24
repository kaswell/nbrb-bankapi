<?php

namespace Kaswell\NbrbBankApi\Traits;

/**
 * Trait HasPropertiesContract
 * @package Kaswell\NbrbBankApi\Traits
 */
trait HasProperties
{
    use HasMutators;
    use HasAccessors;

    /**
     * @var array
     */
    protected array $aliases = [];

    /**
     * @param string $property
     * @return bool
     */
    protected function hasPropertyAlias(string $property): bool
    {
        return array_key_exists($property, $this->aliases);
    }

    /**
     * @param string $property
     * @return string
     */
    protected function getPropertyAlias(string $property): string
    {
        return $this->hasPropertyAlias($property) ? $this->aliases[$property] : $property;
    }

    /**
     * @param string $property
     * @return bool
     */
    protected function hasProperty(string $property): bool
    {
        return property_exists($this, $this->getPropertyAlias($property));
    }

    /**
     * @param string $property
     * @param mixed $value
     */
    public function setProperty(string $property, mixed $value): void
    {
        $property = $this->getPropertyAlias($property);

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
        $property = $this->getPropertyAlias($property);

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