<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use Library\Controller\LivroController;
use Library\Controller\UsuarioController;

return function (App $app) {
    $app->group('/livros', function (RouteCollectorProxy $group) {
        $group->post('', [LivroController::class, 'add']);
        $group->get('', [LivroController::class, 'getAll']);
        $group->get('/{id}', [LivroController::class, 'getById']);
        $group->put('', [LivroController::class, 'update']);
        $group->delete('/{id}', [LivroController::class, 'delete']);
    });

    $app->group('/usuarios', function (RouteCollectorProxy $group) {
        $group->post('', [UsuarioController::class, 'add']);
        $group->get('', [UsuarioController::class, 'getAll']);
        $group->get('/{id}', [UsuarioController::class, 'getById']);
        $group->put('', [UsuarioController::class, 'update']);
        $group->delete('/{id}', [UsuarioController::class, 'delete']);
    });
};
