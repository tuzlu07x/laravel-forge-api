<?php

namespace Fatihtuzlu\ForgeAPI;

class Firewall
{
    public function __construct(private Forge $forge)
    {
    }

    public function create(int $serverId, array $options): array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/firewall-rules', $options);
    }

    public function list(int $serverId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/firewall-rules');
    }

    public function get(int $serverId, int $ruleId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/firewall-rules/' . $ruleId);
    }

    public function delete(int $serverId, int $ruleId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/firewall-rules/' . $ruleId);
    }
}
