<?php

namespace Kaswell\NbrbBankApi\Traits;

/**
 * Trait HasAttributes
 * @package Kaswell\NbrbBankApi\Traits
 */
trait HasAttributes
{
    public function hasAttribute(string $key): bool
    {
    }

    public function getAttribute(string $key): mixed
    {
    }

    public function setAttribute(string $key, mixed $value): void
    {
    }

    /**
     * Determine if a get mutator exists for an attribute.
     *
     * @param  string  $key
     * @return bool
     */
    public function hasGetMutator($key)
    {
        return method_exists($this, 'get'.Str::studly($key).'Attribute');
    }

    /**
     * Get the value of an attribute using its mutator.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function mutateAttribute($key, $value)
    {
        return $this->{'get'.Str::studly($key).'Attribute'}($value);
    }
}