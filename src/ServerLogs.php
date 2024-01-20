<?php

namespace Fatihtuzlu\ForgeAPI;

class ServerLogs
{
    public function __construct(private Forge $forge)
    {
    }

    public function logs(int $serverId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/logs');
    }
}
