<?php

namespace Kaswell\NbrbBankApi\Transports;

use Kaswell\NbrbBankApi\Abstracts\Transport;

class Curl extends Transport
{
    /**
     * @var string
     */
    public string $response;

    /**
     * @var array
     */
    protected array $errors = [];

    /**
     * @param string $path
     * @param ...$request_data
     * @return void
     */
    public function get(string $path, ...$request_data): void
    {
        $url = $this->config->url . $path;

        if (isset($request_data['id'])) {
            $url .= '/' . $request_data['id'];
            unset($request_data['id']);
        }

        if (!empty($request_data)) {
            $url .= '?' . http_build_query($request_data);
        }

        $this->send($url);
    }


    /**
     * @param string $url
     * @return void
     */
    protected function send(string $url): void
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPGET, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $this->response = curl_exec($curl);

        curl_close($curl);
    }

    /**
     * @return array
     */
    public function response(): array
    {
        $response = json_decode($this->response, true) ?? $this->hasError();

        return $response;
    }

    /**
     * @return array
     */
    protected function hasError(): array
    {
        return [];
    }
}