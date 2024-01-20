<?php

namespace Fatihtuzlu\ForgeAPI;

use Fatihtuzlu\ForgeAPI\Abstracts\BaseFunction;

class Nginx extends BaseFunction
{
    public function __construct(private Forge $forge)
    {
    }

    public function list(int $serverId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/nginx/templates/default');
    }

    public function create(int $serverId, array $options): ?array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/nginx/templates/', $options);
    }

    public function getDefault(int $serverId, int $templateId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/nginx/templates/' . $templateId);
    }

    public function get(int $serverId, int $templateId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/nginx/templates/' . $templateId);
    }

    public function update(int $serverId, int $templateId, array $options): ?array
    {
        return $this->forge->put('/api/v1/servers/' . $serverId . '/nginx/templates/' . $templateId, $options);
    }

    public function delete(int $serverId, int $templateId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/nginx/templates/' . $templateId);
    }
}
