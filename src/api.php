<?php

include 'framework/framework.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('status: 302 ');
    header('location: /');
    exit;
}


try{
    $filepath = $API->getApiClass(\Framework\Config::getInstance()->getEnv('CUSTOM_TEMPLATE'));
    $instance = new $filepath([...$API->getPayload(),'action' => $API->getAction()]);

    echo json_encode($instance->runAction());
} catch(\Exception $e) {
    header('status: 400 ');
    echo json_encode(["error" => $e->getMessage()]);
}