<?php

namespace Fatihtuzlu\ForgeAPI;

class Region
{
    public function __construct(private Forge $forge)
    {
    }

    public function list(): ?array
    {
        return $this->forge->get('/api/v1/regions');
    }
}
