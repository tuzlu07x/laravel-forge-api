<?php

use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\Server;
use Fatihtuzlu\ForgeAPI\Service;

include 'Helper/responseDebug.php';
require_once('vendor/autoload.php');
$bearerToken = 'BEARER_TOKEN';

$forge = new Forge($bearerToken);
// $user = new User($forge);
// $show = $user->show();
// dd($show);

$server = new Server($forge);
$option = [
    "provider" => "ocean2",
    "ubuntu_version" => "22.04",
    "type" => "web",
    "credential_id" => 1,
    "name" => "test-via-api",
    "size" => "01",
    "database" => "test123",
    "php_version" => "php82",
    "region" => "ams2",
    "recipe_id" => null
];
// $create = $server->create($option);
// dd($create);
// $list = $server->list();
// $get = $server->get(1);
$updateData = [
    "name" => "renamed-server",
    "ip_address" => "192.241.143.108",
    "private_ip_address" => "10.136.8.40",
    "max_upload_size" => 123,
    "max_execution_time" => 30,
    "network" => [
        2,
        3
    ],
    "timezone" => "Europe/London",
    "tags" => ["london-server"]
];
//$update = $server->update(1, $updateData);
$password = [
    'password' => 'fatih',
];
//$update = $server->updateDatabasePassword(1, $password);
// $delete = $server->delete(1);
// $reboot = $server->reboot(1);
// $recent = $server->recentEvent(1);
// dd($recent);

$url = '/api/v1/servers/1/services/start';
$ar = ["service" => "service-name"];
$method = 'post';
$service = new Service($forge);
$res = $service->sendReq($url, $method, $ar);
dd($res);
