<?php

namespace Fatihtuzlu\ForgeAPI;

class SecurityRule
{
    public function __construct(private Forge $forge)
    {
    }

    public function create(int $serverId, int $siteId, array $options): array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/security-rules', $options);
    }

    public function list(int $serverId, int $siteId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/security-rules');
    }

    public function get(int $serverId, int $siteId, int $ruleId): array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/security-rules/' . $ruleId);
    }

    public function delete(int $serverId, int $siteId, int $ruleId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/security-rules/' . $ruleId);
    }
}
