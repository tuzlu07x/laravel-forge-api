<?php

namespace Fatihtuzlu\ForgeAPI;

class SSHKey
{
    public function __construct(private Forge $forge)
    {
    }

    public function create(int $serverId): array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/keys');
    }

    public function list(int $serverId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/keys');
    }

    public function get(int $serverId, int $keyId): array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/keys/' . $keyId);
    }

    public function delete(int $serverId, int $keyId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/keys/' . $keyId);
    }
}
