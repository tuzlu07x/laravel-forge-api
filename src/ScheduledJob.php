<?php

namespace Fatihtuzlu\ForgeAPI;

class ScheduledJob
{
    public function __construct(private Forge $forge)
    {
    }

    public function create(int $serverId, array $options): array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/jobs', $options);
    }

    public function list(int $serverId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/jobs');
    }

    public function get(int $serverId, int $jobId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/jobs/' . $jobId);
    }

    public function delete(int $serverId, int $jobId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/jobs/' . $jobId);
    }
}
