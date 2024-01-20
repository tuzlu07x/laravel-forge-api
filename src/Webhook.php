<?php

namespace Fatihtuzlu\ForgeAPI;

class Webhook
{
    public function __construct(private Forge $forge)
    {
    }

    public function list(int $serverId, int $siteId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/webhooks');
    }

    public function show(int $serverId, int $siteId, int $webhookId): array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/webhooks' . $webhookId);
    }

    public function create(int $serverId, int $siteId, int $webhookId)
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/webhooks' . $webhookId);
    }

    public function delete(int $serverId, int $siteId, int $webhookId): array
    {
        return $this->forge->delete('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/webhooks' . $webhookId);
    }
}
