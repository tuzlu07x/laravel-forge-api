<?php

namespace Fatihtuzlu\ForgeAPI;

class Backup
{
    public function __construct(private Forge $forge)
    {
    }

    public function list(int $serverId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/backup-configs');
    }

    public function create(int $serverId, array $options): ?array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/backup-configs', $options);
    }

    public function get(int $serverId, int $backupConfigirationId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/backup-configs/' . $backupConfigirationId);
    }

    public function run(int $serverId, int $backupConfigirationId): void
    {
        $this->forge->post('/api/v1/servers/' . $serverId . '/backup-configs/' . $backupConfigirationId);
    }

    public function deleteBackupConfigiration(int $serverId, int $backupConfigirationId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/backup-configs/' . $backupConfigirationId);
    }

    public function restore(int $serverId, int $backupConfigirationId, int $backupId): void
    {
        $this->forge->post('/api/v1/servers/' . $serverId . '/backup-configs/' . $backupConfigirationId . '/backups/' . $backupId);
    }

    public function deleteBackup(int $serverId, int $backupConfigirationId, int $backupId): void
    {
        $this->forge->post('/api/v1/servers/' . $serverId . '/backup-configs/' . $backupConfigirationId . '/backups/' . $backupId);
    }
}
