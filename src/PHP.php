<?php

namespace Fatihtuzlu\ForgeAPI;

class PHP
{
    public function __construct(private Forge $forge)
    {
    }

    public function list(int $serverId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/php');
    }

    public function install(int $serverId, array $options): ?array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/php/', $options);
    }

    public function upgrade(int $serverId, array $options): ?array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/php/update/', $options);
    }

    public function enable(int $serverId): ?array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/php/opcache');
    }

    public function disable(int $serverId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/php/opcache');
    }
}
