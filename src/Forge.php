<?php

namespace Fatihtuzlu\ForgeAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Forge
{
    private ?Client $client = null;

    public function __construct(
        private string $bearerToken,
        private string $baseUrl = 'https://forge.laravel.com/api/v1'
    ) {
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->bearerToken,
                'Content-Type' => 'application/json',
            ]
        ]);
    }



    private function request(string $method, string $url, array $options): mixed
    {
        try {
            $response = $this->client->request($method, $url, $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }

    public function post(string $uri, array $options = []): mixed
    {
        return $this->request('POST', $uri, $options);
    }

    public function get(string $uri, array $options = []): mixed
    {
        return $this->request('GET', $uri, $options);
    }

    public function put(string $uri, array $options): mixed
    {
        return $this->request('PUT', $uri, $options);
    }

    public function delete(string $uri, array $options = []): mixed
    {
        return $this->request('DELETE', $uri, $options);
    }
}
