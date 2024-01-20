<?php

namespace Fatihtuzlu\ForgeAPI;

use Fatihtuzlu\ForgeAPI\Abstracts\BaseFunction;

class Site extends BaseFunction
{
    public function __construct(private Forge $forge)
    {
    }

    public function list(int $serverId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites');
    }

    public function create(int $serverId, array $options): ?array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/sites/', $options);
    }

    public function get(int $serverId, int $siteId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId);
    }

    public function update(int $serverId, int $siteId, array $options): ?array
    {
        return $this->forge->put('/api/v1/servers/' . $serverId . '/sites/' . $siteId, $options);
    }

    public function delete(int $serverId, int $siteId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/sites/' . $siteId);
    }

    public function changePhpVersion(int $serverId, int $siteId, array $options): void
    {
        $this->forge->put('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/php', $options);
    }

    public function addAliases(int $serverId, int $siteId, array $options): array
    {
        return $this->forge->put('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/aliases', $options);
    }

    public function loadBalancing(int $serverId, int $siteId): array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/balancing');
    }

    public function updateLoadBalancing(int $serverId, int $siteId, array $options): void
    {
        $this->forge->put('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/balancing', $options);
    }

    public function log(int $serverId, int $siteId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/logs');
    }
}
