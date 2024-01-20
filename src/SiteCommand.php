<?php

namespace Fatihtuzlu\ForgeAPI;

class SiteCommand
{
    public function __construct(private Forge $forge)
    {
    }

    public function execute(int $serverId, int $siteId, array $options): array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/commands', $options);
    }

    public function list(int $serverId, int $siteId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/commands');
    }

    public function get(int $serverId, int $siteId, int $commandId): array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/commands/' . $commandId);
    }
}
