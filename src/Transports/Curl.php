<?php

namespace Kaswell\NbrbBankApi\Transports;

use Kaswell\NbrbBankApi\Contracts\ConfigurationContract as Config;
use Kaswell\NbrbBankApi\Contracts\TransportContract as Transport;

class Curl implements Transport
{
    /**
     * @var Config
     */
    protected Config $config;

    /**
     * @var string
     */
    protected string $response;

    /**
     * @var array
     */
    protected array $errors = [];

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $data
     * @return void
     */
    public function send(string $url, string $method = 'GET', array $data = []): void
    {
        $this->response = $this->get($url, $method, $data);
    }

    /**
     * @param string $url
     * @return bool|string
     */
    protected function get(string $url, string $method = 'GET', array $data = []): bool|string
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->config->url() . $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ]);

        if (mb_strtolower($method) === 'post'){
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        } else {
            curl_setopt($curl, CURLOPT_HTTPGET, true);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

    /**
     * @return array
     */
    public function response(): array
    {
        $response = [];
        try {
            $response = json_decode($this->response, true);
        } finally {
            return $response;
        }
    }
}