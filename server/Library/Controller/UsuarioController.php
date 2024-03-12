<?php

namespace Library\Controller;

use Exception;
use Library\Model\Factory\UsuarioFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsuarioController
{
    public function add(Request $request, Response $response, array $args): Response
    {
        $data = json_decode($request->getBody(), true);

        try {
            $usuario = UsuarioFactory::add($data);
            $id = $usuario->getId();

            $response->getBody()->write("Usuário cadastrado com sucesso! Acesse em: <a href='http://localhost:8080/usuarios/$id'>http://localhost:8080/usuarios/$id</a>");
        } catch(\Exception $e) {
            return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
        }

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
    }

    public function getAll(Request $request, Response $response, array $args): Response
    {
        $data = UsuarioFactory::getAll(true);
        $payload = json_encode($data);
        $response->getBody()->write($payload);

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
    }

    public function getById(Request $request, Response $response, array $args): Response
    {
        $data = UsuarioFactory::getById($args['id'], true);
        $payload = json_encode($data);
        $response->getBody()->write($payload);

        if (empty($data)) {
            return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
        }

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        $data = json_decode($request->getBody(), true);
        $usuario = UsuarioFactory::getById($data['id'], true);

        if (!$usuario) {
            return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
        }

        try {
            UsuarioFactory::update($data);
        } catch(Exception $e) {
            return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
        }

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(204);
    }

    public function delete(Request $request, Response $response, array $args): Response
    {
        $usuario = UsuarioFactory::getById($args['id'], true);

        if (!$usuario) {
            return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
        }

        UsuarioFactory::delete($args['id']);

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(204);
    }
}
