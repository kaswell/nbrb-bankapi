<?php

namespace Kaswell\NbrbBankApi;

use Kaswell\NbrbBankApi\Contracts\ConfigurationContract as Config;
use Kaswell\NbrbBankApi\Contracts\TransportContract;

class TransportFactory
{
    /**
     * @param Config $config
     * @return TransportContract
     * @throws \Exception
     */
    public static function create(Config $config): TransportContract
    {
        $transport = $config->transport();
        if (class_exists($transport)) {
            return new $transport($config);
        } else {
            $transport = __NAMESPACE__ . '\\' . 'Transports' . '\\' . StrHelper::ucfirst($transport);
            if (class_exists($transport)) {
                return new $transport($config);
            }
        }
        throw new \Exception();
    }
}