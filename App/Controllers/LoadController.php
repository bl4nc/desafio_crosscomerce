<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\ETL\Transform;

final class LoadController
{

    public function Load(Request $request, Response $response, array $args)
    {
        $transform = new Transform;
        $response = $response->withJson($transform->transform());
        return $response;
    }
}
