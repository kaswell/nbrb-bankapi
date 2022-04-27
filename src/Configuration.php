<?php

namespace Kaswell\NbrbBankApi;

use Kaswell\NbrbBankApi\Contracts\ConfigurationContract;

/**
 * Class Configuration
 * @package Kaswell\NbrbBankApi
 * @property string $url
 * @property string $transport
 */
class Configuration implements ConfigurationContract
{
    /**
     * @var array
     */
    protected array $config;

    /**
     * @param string|null $path
     * @throws \Exception
     */
    public function __construct(?string $path = null)
    {
        if ($path === null) {
            $this->config = require_once __DIR__ . '/../config/nbrb-bankapi.php';
        } else {
            if (file_exists($path)) {
                $this->config = require_once $path;
            } else {
                throw new \Exception('Config file not found');
            }
        }
    }

    /**
     * @param string $option
     * @return mixed|null
     */
    public function __get(string $option): mixed
    {
        return isset($this->config[$option]) ? $this->config[$option] : null;
    }
}