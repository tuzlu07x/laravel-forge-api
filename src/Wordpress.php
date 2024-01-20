<?php

namespace Fatihtuzlu\ForgeAPI;

class Wordpress
{
    public function __construct(private Forge $forge)
    {
    }

    public function install(int $serverId, int $siteId, array $options): void
    {
        $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/wordpress', $options);
    }

    public function uninstall(int $serverId, int $siteId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/wordpress');
    }
}
