<?php

namespace Kaswell\NbrbBankApi;

use Kaswell\NbrbBankApi\Contracts\ConfigurationContract as Config;
use Kaswell\NbrbBankApi\Contracts\TransportContract;
use Kaswell\NbrbBankApi\Enums\Request;
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


    /**
     * @return array
     */
    public function getCurrencies(): array
    {
        $this->transport->get(Request::Currencies->path());

        $currencies = [];
        foreach ($this->transport->response() as $data){
            $currencies[] = (new Currency($data))->toArray();
        }

        return $currencies;
    }

    /**
     * @param int|string $id
     * @param string|null $ondate
     * @param int|null $periodicity
     * @param int $parammode
     * @return array
     */
    public function getCurrency(int|string $id, string $ondate = null, int $periodicity = null, int $parammode = 0): array
    {
        $this->transport->get(Request::Currency->path(), id: $id);

        $currency = new Currency($this->transport->response());

        return $currency->toArray();
    }


    public function getRates()
    {
        $this->transport->get(Request::Rates->path());
    }

    public function getRate()
    {
        $this->transport->get(Request::Rate->path());
    }
}