<?php

namespace Fatihtuzlu\ForgeAPI;

class Database
{
    public function __construct(private Forge $forge)
    {
    }

    public function list(int $serverId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/databases');
    }

    public function create(int $serverId, array $options): ?array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/databases/', $options);
    }

    public function get(int $serverId, int $databaseId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/databases/' . $databaseId);
    }

    public function sync(int $serverId): ?array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/databases/sync/');
    }

    public function delete(int $serverId, int $databaseId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/databases/' . $databaseId);
    }
}
