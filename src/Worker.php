<?php

namespace Fatihtuzlu\ForgeAPI;

class Worker
{
    public function __construct(private Forge $forge)
    {
    }

    public function create(int $serverId, int $siteId, array $options): array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/workers', $options);
    }

    public function list(int $serverId, int $siteId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/workers');
    }

    public function get(int $serverId, int $siteId, int $workerId): array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/workers/' . $workerId);
    }

    public function delete(int $serverId, int $siteId, int $workerId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/workers/' . $workerId);
    }

    public function restart(int $serverId, int $siteId, int $workerId): void
    {
        $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/workers/' . $workerId . '/restart');
    }
}
