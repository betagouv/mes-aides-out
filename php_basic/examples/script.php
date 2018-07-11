<?php

require __DIR__ . '/../src/basicAuth.php';

$prefix = $argv[1];
$username = $argv[2];
$password = $argv[3];
$token = $argv[4];

$result = getData($prefix, $username, $password, $token);

print_r($result);
