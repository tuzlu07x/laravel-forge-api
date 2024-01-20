<?php

use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\Server;
use Fatihtuzlu\ForgeAPI\Service;
use Fatihtuzlu\ForgeAPI\User;

include 'Helper/responseDebug.php';
require_once('vendor/autoload.php');
$bearerToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZmUzODQwY2JhZTA3NTQzMGRhMDcwMWQ0NDBkZWI2NjliMGMwMzEyODc2NGM4NjdkZmRmYzU4NDdlMTA3ZmU0ZTkzODUyYmFjN2UzODNkZWEiLCJpYXQiOjE3MDU1ODM1MjMuOTMxNTA2LCJuYmYiOjE3MDU1ODM1MjMuOTMxNTA4LCJleHAiOjIwMjEyMDI3MjMuOTI1MjQ4LCJzdWIiOiIyMTYzNDIiLCJzY29wZXMiOltdfQ.eFHJp0r_JuSoV5zf5YhR96iXH9oYkj4pCNtw5DVjC1bBaOaEI0--CxxlCn4E9oezLaJeYEkJrceGA7nIGdF9Uy7B5gG0txi0XOf83SN3OqEEgeC5ZQSuv3YAEh0RVX-YHWSDwGWVGZ_lWdPjGt-zw22ZwvptPxFGKbGVQ6TE8iLmnte7nCY4hjAIKnKqvEwCkFWrFLBiKq1hLRj-Qq5QAOEwDEayhLkRlqYmMQ_ie_i2uI2Ge8W24L7_3SwG8ke5GuGz3Z7OZFuLpfKy-ggtB1UT_bkBj_nOyZN--tVRxLgAFRUx33Lk5HTheftdOrbwIs15ynfnYq83UYkWjXLSR4mTJo5Uxqi217GmRf9-BKBmeCAk_J1PgXrfqMyfHQRZp8ENq4jLHPlU-QtAKZNGRqt1-GcLjSBz9qr8BtL4FKGhFR79uOmY1HwgBnqCkb-gx0SjzaVKPEHS178FLGdt1_lSAOrsBmeQbQM7THSE-ESUaObnzyNbBF-AgYP1dJRUC4m863GffQ7GQl120l-SxuBTzqtRXDX_vJKEdWahKlnDjdCFWHmQIYEnDz_qxrDLqOWZBtNbLWrPowe4Y1zd_4RdMKMEj7NQPMZQPh7A59Vbqn6_M76Tqtn_xAMkGya3mgyHAQHb_jwz3Z3ZqZ7sock2N2RBftPwWVUx3qIqxCI';

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
