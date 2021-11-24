<?php

use App\Controllers\LoadController;

function slimConfiguration(): \Slim\Container
{
    $configuration = [
        'settings' => [
            'displayErrorDetails' => false,
        ],
    ];

    $container = new \Slim\Container($configuration);

    return $container;
}

$app = new \Slim\App(slimConfiguration());




$app->get('/',function(){
    header("location: ./load");
    exit;
});
$app->get('/load', LoadController::class . ':Load');
$app->run();
