<?php

namespace Fatihtuzlu\ForgeAPI\Abstracts;

use Fatihtuzlu\ForgeAPI\Forge;

abstract class ServiceAbstract
{
    public function __construct(
        protected Forge $forge,
    ) {
    }

    abstract public function sendReq(string $uri, string $method, array $options = []): mixed;

    protected function callHttpMethod(string $method, string $uri, array $options = []): mixed
    {
        $method = mb_strtolower($method);
        return $this->forge->$method($uri, $options);
    }
}
