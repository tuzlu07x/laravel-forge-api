<?php

namespace Fatihtuzlu\ForgeAPI;

class SSLCertificate
{
    public function __construct(private Forge $forge)
    {
    }

    public function installAnExisting(int $serverId, int $siteId, array $options): array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/certificates', $options);
    }

    public function clonAnExisting(int $serverId, int $siteId, array $options): array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/certificates', $options);
    }

    public function letsencrypt(int $serverId, int $siteId, array $options): array
    {
        return $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/certificates/letsencrypt', $options);
    }

    public function list(int $serverId, int $siteId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/certificates');
    }

    public function get(int $serverId, int $siteId, int $certificateId): ?array
    {
        return $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/certificates' . $certificateId);
    }

    public function getSigninReq(int $serverId, int $siteId, int $certificateId): void
    {
        $this->forge->get('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/certificates' . $certificateId . '/csr');
    }

    public function install(int $serverId, int $siteId, int $certificateId, array $options): void
    {
        $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/certificates' . $certificateId . '/install', $options);
    }

    public function activate(int $serverId, int $siteId, int $certificateId): void
    {
        $this->forge->post('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/certificates' . $certificateId . '/activate');
    }

    public function delete(int $serverId, int $siteId, int $certificateId): void
    {
        $this->forge->delete('/api/v1/servers/' . $serverId . '/sites/' . $siteId . '/certificates' . $certificateId);
    }
}
