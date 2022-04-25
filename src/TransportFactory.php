<?php

namespace Kaswell\NbrbBankApi;

use Kaswell\NbrbBankApi\Contracts\ConfigurationContract as Config;
use Kaswell\NbrbBankApi\Contracts\TransportContract as Transport;
use Exception;

class TransportFactory
{
    /**
     * @param Config $config
     * @return Transport
     * @throws \Exception
     */
    public static function create(Config $config): Transport
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

        throw new Exception('Unknown transport.');
    }
}