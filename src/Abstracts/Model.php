<?php

namespace Kaswell\NbnbApi\Abstracts;

/**
 * Class Model
 * @package Kaswell\NbnbApi\Abstracts
 */
abstract class Model
{
    /**
     * Model constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}