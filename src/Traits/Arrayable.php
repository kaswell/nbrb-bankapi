<?php

namespace Kaswell\NbrbBankApi\Traits;

/**
 * Trait Arrayable
 * @package Kaswell\NbrbBankApi\Traits
 */
trait Arrayable
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}