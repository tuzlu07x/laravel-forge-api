<?php

namespace Fatihtuzlu\ForgeAPI;

class Monitoring
{
    public function __construct(private Forge $forge)
    {
    }

    public function list(int $serverId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/monitors');
    }

    public function create(int $serverId, array $options): ?array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/monitors', $options);
    }

    public function get(int $serverId, int $monitorId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/monitors/' . $monitorId);
    }

    public function delete(int $serverId, int $monitorId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/monitors/' . $monitorId);
    }
}
