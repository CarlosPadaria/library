<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use Library\Controller\HomeController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello, world');

        return $response;
    });
    /*   $app->group('/', function (RouteCollectorProxy $group) {
           $group->get('', [HomeController::class, 'index']);
           $group->get('123', [HomeController::class, 'teste']);
       });*/
};
