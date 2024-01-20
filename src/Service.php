<?php

namespace Fatihtuzlu\ForgeAPI;

use Fatihtuzlu\ForgeAPI\Abstracts\ServiceAbstract;

class Service extends ServiceAbstract
{
    public function sendReq(string $uri, string $method, array $options = []): mixed
    {
        return $this->callHttpMethod($method, $uri, $options);
    }
}
