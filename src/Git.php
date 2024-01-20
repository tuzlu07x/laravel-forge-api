<?php

namespace Fatihtuzlu\ForgeAPI;

class Git
{
    public function __construct(private Forge $forge)
    {
    }

    public function install(int $serverId, int $siteId, array $options): array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/git', $options);
    }

    public function update(int $serverId, int $siteId, array $options): array
    {
        return $this->forge->put('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/git', $options);
    }

    public function remove(int $serverId, int $siteId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/git');
    }

    public function createDeployKey(int $serverId, int $siteId): array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/deploy-key');
    }

    public function deleteDeployKey(int $serverId, int $siteId): void
    {
        $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/deploy-key');
    }
}
