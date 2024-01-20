<?php

namespace Fatihtuzlu\ForgeAPI;

class PhpMyAdmin
{
    public function __construct(private Forge $forge)
    {
    }

    public function install(int $serverId, int $siteId, array $options): void
    {
        $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/phpmyadmin', $options);
    }

    public function uninstall(int $serverId, int $siteId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/phpmyadmin');
    }
}
