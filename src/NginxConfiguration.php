<?php

namespace Fatihtuzlu\ForgeAPI;

class NginxConfiguration
{
    public function __construct(private Forge $forge)
    {
    }

    public function get(int $serverId, int $siteId): array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/nginx');
    }

    public function update(int $serverId, int $siteId, array $options): array
    {
        return $this->forge->put('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/nginx', $options);
    }

    public function getEnv(int $serverId, int $siteId): array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/env');
    }

    public function updateEnv(int $serverId, int $siteId, array $options): array
    {
        return $this->forge->put('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/env', $options);
    }
}
