<?php

namespace Kaswell\NbrbBankApi;

use Kaswell\NbrbBankApi\Contracts\ConfigurationContract;

/**
 * Class Configuration
 * @package Kaswell\NbrbBankApi
 */
class Configuration implements ConfigurationContract
{
    /**
     * @var array
     */
    protected array $config;

    /**
     * @param string|null $path
     */
    public function __construct(string $path = null)
    {
        $this->config = require_once __DIR__ . '/../config/nbrb-bankapi.php';
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return $this->config['url'];
    }

    /**
     * @return string
     */
    public function transport(): string
    {
        return $this->config['transport'];
    }
}