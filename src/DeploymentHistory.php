<?php

namespace Fatihtuzlu\ForgeAPI;

class DeploymentHistory
{
    public function __construct(private Forge $forge)
    {
    }

    public function list(int $serverId, int $siteId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/deployment-history');
    }

    public function get(int $serverId, int $siteId, int $deploymentId): array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/deployment-history/' . $deploymentId);
    }

    public function getOutput(int $serverId, int $siteId, int $deploymentId): array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/deployment-history/' . $deploymentId . '/output');
    }
}
