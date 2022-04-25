<?php

namespace Kaswell\NbrbBankApi\Contracts;

interface HasPropertiesAliasContract
{
    /**
     * @param string $property
     * @return bool
     */
    public function hasPropertyAlias(string $property): bool;

    /**
     * @param string $property
     * @return string|null
     */
    public function getPropertyAlias(string $property): ?string;

    /**
     * @param string|array $alias
     * @param string|null $property
     * @return void
     */
    public function mergePropertyAlias(string|array $alias, ?string $property = null): void;
}