<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use Library\Controller\LivroController;

return function (App $app) {
    $app->group('/livros', function (RouteCollectorProxy $group) {
        $group->post('', [LivroController::class, 'add']);
        $group->get('', [LivroController::class, 'getAll']);
        $group->get('/{id}', [LivroController::class, 'getById']);
        $group->put('', [LivroController::class, 'update']);
        $group->delete('/{id}', [LivroController::class, 'delete']);
    });
};
