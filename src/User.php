<?php

namespace Fatihtuzlu\ForgeAPI;

class User extends Forge
{

    public function __construct(
        private Forge $forge,
        private string $uri = '/api/v1/user'
    ) {
    }

    public function show(): array
    {
        return $this->forge->get($this->uri);
    }
}
