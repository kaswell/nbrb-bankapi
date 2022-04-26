<?php

namespace Kaswell\NbrbBankApi\Models\Traits;

trait HasPropertiesAlias
{
    /**
     * @var array
     */
    protected static array $aliases = [];

    /**
     * @param string $property
     * @return bool
     */
    public function hasPropertyAlias(string $property): bool
    {
        return array_key_exists($property, static::$aliases);
    }

    /**
     * @param string $property
     * @return string|null
     */
    public function getPropertyAlias(string $property): ?string
    {
        return $this->hasPropertyAlias($property) ? static::$aliases[$property] : null;
    }

    /**
     * @param string|array $alias
     * @param string|null $property
     * @return void
     */
    public function mergePropertyAlias(string|array $alias, ?string $property = null): void
    {
        if (is_array($alias)) {
            $merged = [];
            foreach ($alias as $key => $value) {
                if ($this->hasProperty($value)) {
                    $merged[$key] = $value;
                }
            }
        }

        if (is_string($alias) && $this->hasProperty($property)) {
            $merged = [$alias => $property];
        }

        if (isset($merged) && !empty($merged)) {
            static::$aliases = array_merge(static::$aliases, $merged);
        }
    }
}