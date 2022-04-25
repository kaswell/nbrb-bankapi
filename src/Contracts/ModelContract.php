<?php

namespace Kaswell\NbrbBankApi\Contracts;

interface ModelContract
{
    /**
     * @param ...$data
     */
    public function __construct(...$data);

    /**
     * @param array $data
     * @return void
     */
    public function init(array $data): void;
}