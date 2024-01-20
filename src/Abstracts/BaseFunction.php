<?php

namespace Fatihtuzlu\ForgeAPI\Abstracts;

abstract class BaseFunction
{
    abstract protected function list(int $serverId): ?array;
    abstract protected function create(int $serverId, array $options): ?array;
    abstract protected function get(int $serverId, int $id): ?array;
    abstract protected function update(int $serverId, int $systemId, array $options): ?array;
    abstract protected function delete(int $serverId, int $systemId): void;
}
