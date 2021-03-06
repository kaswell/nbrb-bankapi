<?php

namespace Kaswell\NbrbBankApi;

use Exception;
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
     * @throws Exception
     */
    public function __construct(Config $config = new Configuration)
    {
        $this->config = $config;

        $this->transport = TransportFactory::create($this->config);
    }

    /**
     * @param int|null $id
     * @return array
     * @throws Exception
     */
    public function getCurrencies(?int $id = null): array
    {
        if ($id !== null) {
            return $this->getCurrency($id);
        }

        $this->transport->get(path: Request::Currencies->path());

        $currencies = [];
        foreach ($this->transport->response() as $data) {
            $currencies[] = (new Currency($data))->toArray();
        }

        return $currencies;
    }

    /**
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getCurrency(int $id): array
    {
        $validator = ValidatorFactory::make(Request::Currencies);

        if ($validator->validate(id: $id)) {
            throw $validator->exception();
        }

        $this->transport->get(path: Request::Currencies->path(), id: $id);

        $currency = new Currency($this->transport->response());

        return $currency->toArray();
    }

    /**
     * @param string|null $ondate
     * @param int $periodicity
     * @return array
     * @throws Exception
     */
    public function getRates(string $ondate = null, int $periodicity = 0): array
    {
        $validator = ValidatorFactory::make(Request::Rates);

        if ($validator->validate(ondate: $ondate, periodicity: $periodicity)) {
            throw $validator->exception();
        }

        $this->transport->get(path: Request::Rates->path(), ondate: $ondate, periodicity: $periodicity);

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
     * @param int $periodicity
     * @return array
     * @throws Exception
     */
    public function getRate(int|string $id, int $parammode = 0, string $ondate = null): array
    {
        $validator = ValidatorFactory::make(Request::Rates);

        if ($validator->validate(id: $id, parammode: $parammode, ondate: $ondate)) {
            throw $validator->exception();
        }

        $this->transport->get(path: Request::Rates->path(), id: $id, ondate: $ondate, parammode: $parammode);

        $rate = new Rate($this->transport->response());

        return $rate->toArray();
    }
}