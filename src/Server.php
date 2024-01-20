<?php

namespace Fatihtuzlu\ForgeAPI;

class Server
{
    public function __construct(
        private Forge $forge,
    ) {
    }

    public function create(array $option): array
    {
        return $this->forge->post('/api/v1/servers', $option);
    }

    public function list(): ?array
    {
        return $this->forge->get('/api/v1/servers');
    }

    public function get(int $id): array
    {
        return $this->forge->get('/api/v1/servers/' . $id);
    }

    public function update(int $id, array $option): array
    {
        return $this->forge->put('/api/v1/servers/' . $id, $option);
    }

    public function updateDatabasePassword(int $id, array $option): ?array
    {
        return $this->forge->put('/api/v1/servers/' . $id . '/database-password', $option);
    }

    public function delete(int $id): void
    {
        $this->forge->delete('/api/v1/servers/' . $id);
    }

    public function reboot(int $id): array
    {
        return $this->forge->post('/api/v1/servers/' . $id . '/reboot');
    }

    public function revoke(int $id): array
    {
        return $this->forge->post('/api/v1/servers/' . $id . '/revoke');
    }

    public function reconnect(int $id): array
    {
        return $this->forge->post('/api/v1/servers/' . $id . '/reconnect');
    }

    public function reactivate(int $id): array
    {
        return $this->forge->post('/api/v1/servers/' . $id . '/reactivate');
    }

    public function recentEvent(int $id): array
    {
        return $this->forge->post('/api/v1/servers/' . $id . '/services/start');
    }
}
