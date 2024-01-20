<?php

namespace Fatihtuzlu\ForgeAPI;

class Deployment
{
    public function __construct(private Forge $forge)
    {
    }

    public function enable(int $serverId, int $siteId): void
    {
        $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/deployment');
    }

    public function disable(int $serverId, int $siteId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/deployment');
    }

    public function get(int $serverId, int $siteId): void
    {
        $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/deployment/script');
    }

    public function update(int $serverId, int $siteId, array $options): void
    {
        $this->forge->put('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/deployment/script', $options);
    }

    public function deploy(int $serverId, int $siteId): void
    {
        $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/deployment/deploy');
    }

    public function reset(int $serverId, int $siteId): void
    {
        $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/deployment/reset');
    }

    public function log(int $serverId, int $siteId): void
    {
        $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/deployment/log');
    }
}
