<?php

namespace Kaswell\NbrbBankApi\Transports;

use Kaswell\NbrbBankApi\Request;

class Curl extends AbstractTransport
{
    /**
     * @var string
     */
    protected string $response;

    /**
     * @var array
     */
    protected array $errors = [];

    /**
     * @var array
     */
    protected array $request = [];

    /**
     * @param string $request_type
     * @param ...$request
     * @return array
     * @throws \Exception
     */
    public function get(string $request_type, ...$request): array
    {
        if (enum_exists(Request::class)){

        }

        if (!method_exists($this, $request_type)){
            throw new \Exception('Method not found.');
        }

        $this->sanitizeRequest($request_type, $request);

        return $this->{$request_type}($this->request);
    }

    /**
     * @param string $request_type
     * @param array $request
     * @return void
     */
    protected function sanitizeRequest(string $request_type, array $request): void
    {
        switch ($request_type){
            case 'currency': break;
            case 'rates': break;
            case 'rate': break;
            default: break;
        }
        $this->request($request);
    }

    /**
     * @param array $request
     * @return void
     */
    protected function request(array $request): void
    {
        $this->request = $request;
    }


    /**
     * @return array
     */
    protected function currencies(): array
    {
        $this->send('currencies');

        return $this->response();
    }


    protected function currency(): array
    {
        extract($this->request, EXTR_REFS);

        if (!isset($id)){
            throw new \Exception('Не задан ID.');
        }

        /* ondate periodicity parammode */
        $query = http_build_query($this->request);

        $this->send('currencies/' . $this->request['id']);

        return $this->response();
    }



    protected function rates()
    {
    }

    protected function rate()
    {
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $data
     * @return void
     */
    protected function send(string $url): void
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->config->url() . $url);
        curl_setopt($curl, CURLOPT_HTTPGET, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $this->response = curl_exec($curl);

        curl_close($curl);
    }

    /**
     * @return array
     */
    protected function response(): array
    {
        $response = [];
        try {
            $response = json_decode($this->response, true);
        } finally {
            $this->errors[] = 'Не возможно декодировать';
            return $response;
        }
    }
}