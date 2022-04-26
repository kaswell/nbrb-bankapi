<?php

namespace Kaswell\NbrbBankApi\Models\Traits;

/**
 * Trait ToArray
 * @package Kaswell\NbrbBankApi\Traits
 */
trait ToArray
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}