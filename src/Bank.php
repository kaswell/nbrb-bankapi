<?php

namespace Kaswell\NbrbBankApi;

use Kaswell\NbrbBankApi\Contracts\ConfigurationContract as Config;
use Kaswell\NbrbBankApi\Contracts\TransportContract;
use Kaswell\NbrbBankApi\Enums\Request;
use Kaswell\NbrbBankApi\Models\Currency;
use Kaswell\NbrbBankApi\Models\Rate;

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
     * @param int|null $id
     * @return array
     * @throws \Exception
     */
    public function getCurrencies(?int $id = null): array
    {
        if ($id !== null) {
            return $this->getCurrency($id);
        }

        $this->transport->get(Request::Currencies->path());

        $currencies = [];
        foreach ($this->transport->response() as $data) {
            $currencies[] = (new Currency($data))->toArray();
        }

        return $currencies;
    }

    /**
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function getCurrency(int $id): array
    {
        if (Validator::make(Request::Currencies, id: $id)) {
            throw new \Exception('Validation exception');
        }

        $this->transport->get(Request::Currencies->path(), id: $id);

        $currency = new Currency($this->transport->response());

        return $currency->toArray();
    }

    /**
     * @param string|null $ondate
     * @param int $periodicity
     * @return array
     */
    public function getRates(string $ondate = null, int $periodicity = 0): array
    {
        if (Validator::make(Request::Rates, ondate: $ondate, periodicity: $periodicity)) {
            throw new \Exception('Validation exception');
        }

        $this->transport->get(Request::Rates->path(), ondate: $ondate, periodicity: $periodicity);

        $rates = [];
        foreach ($this->transport->response() as $data) {
            $rates[] = (new Rate($data))->toArray();
        }

        return $rates;
    }


    /**
     * @param int|string $id
     * @param int $parammode
     * @param string|null $ondate
     * @param int|null $periodicity
     * @return array
     * @throws \Exception
     */
    public function getRate(int|string $id, int $parammode = 0, string $ondate = null, int $periodicity = null): array
    {
        if (Validator::make(Request::Rates, id: $id, parammode: $parammode, ondate: $ondate, periodicity: $periodicity)) {
            throw new \Exception('Validation exception');
        }

        $this->transport->get(Request::Rates->path(), id: $id, ondate: $ondate, parammode: $parammode, periodicity: $periodicity);

        $rate = new Rate($this->transport->response());

        return $rate->toArray();
    }
}