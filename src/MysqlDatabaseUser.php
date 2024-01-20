<?php

namespace Fatihtuzlu\ForgeAPI;

use Fatihtuzlu\ForgeAPI\Abstracts\BaseFunction;

class MysqlDatabaseUser extends BaseFunction
{
    public function __construct(private Forge $forge)
    {
    }

    public function list(int $serverId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/mysql-users');
    }

    public function create(int $serverId, array $options): ?array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/mysql-users/', $options);
    }

    public function get(int $serverId, int $userId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/mysql-users/' . $userId);
    }

    public function update(int $serverId, int $userId, array $options): ?array
    {
        return $this->forge->put('/api/v1/servers/' . $serverId . '/mysql-users/' . $userId, $options);
    }

    public function delete(int $serverId, int $userId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/mysql/' . $userId);
    }
}
