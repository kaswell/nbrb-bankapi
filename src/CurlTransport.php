<?php

namespace Kaswell\NbrbBankApi;

use Kaswell\NbrbBankApi\Contracts\ConfigurationContract as Config;
use Kaswell\NbrbBankApi\Contracts\TransportContract;

class CurlTransport implements TransportContract
{
    /**
     * @var Config
     */
    protected Config $config;

    protected string $result;

    /**
     * @param Config $config
     * @return $this
     */
    public function init(Config $config): CurlTransport
    {
        $this->config = $config;
        return $this;
    }

    public function send(string $url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->config->url() . $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_HEADER, '');

        $this->result = curl_exec($curl);

        curl_close($curl);
    }

    public function result()
    {
        return json_decode($this->result, true);
    }
}