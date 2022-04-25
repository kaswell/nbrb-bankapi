<?php

namespace Kaswell\NbrbBankApi;

use Kaswell\NbrbBankApi\Contracts\ConfigurationContract as Config;
use Kaswell\NbrbBankApi\Contracts\TransportContract;
use Kaswell\NbrbBankApi\Models\Currency;

class Bank
{
    /**
     * @var Config
     */
    protected Config $config;

    /**
     * @var TransportContract
     */
    protected TransportContract $transport;

    /**
     * @param Config $config
     * @throws \Exception
     */
    public function __construct(Config $config = new Configuration)
    {
        $this->config = $config;

        $this->transport = TransportFactory::create($this->config);
    }


    public function getCurrencies()
    {
        $this->transport->send('currencies');

        $currencies = [];
        foreach ($this->transport->response() as $data){
            $currencies[] = (new Currency($data))->toArray();
        }
        return $currencies;
    }
}