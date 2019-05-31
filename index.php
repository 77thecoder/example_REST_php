<?php
$urls = explode('/', trim($_SERVER['REQUEST_URI'],'/'));

$router = ucfirst($urls[1]);

try {
    if (! @file_exists("api/{$router}.php"))
        throw new RuntimeException('API Not found', 404);
    else
        require_once("api/{$router}.php");
} catch (RuntimeException $e) {
    echo json_encode(Array('error' => $e->getMessage()));
    die();
}

try {
    $api = new $router();
    $api->run();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}