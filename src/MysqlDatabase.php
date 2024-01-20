<?php

namespace Fatihtuzlu\ForgeAPI;

class MysqlDatabase
{
    public function __construct(private Forge $forge)
    {
    }

    public function list(int $serverId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/mysql');
    }

    public function create(int $serverId, array $options): ?array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/mysql/', $options);
    }

    public function get(int $serverId, int $databaseId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/mysql/' . $databaseId);
    }

    public function delete(int $serverId, int $databaseId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/mysql/' . $databaseId);
    }
}
