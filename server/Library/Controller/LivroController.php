<?php

namespace Library\Controller;

use Exception;
use Library\Model\Factory\LivroFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LivroController
{
    public function add(Request $request, Response $response, array $args): Response
    {
        $data = json_decode($request->getBody(), true);

        try {
            $livro = LivroFactory::add($data);
            $id = $livro->getId();

            $response->getBody()->write("Livro cadastrado com sucesso! Acesse em: <a href='http://localhost:8080/livros/$id'>http://localhost:8080/livros/$id</a>");
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
        $data = LivroFactory::getAll(true);
        $payload = json_encode($data);
        $response->getBody()->write($payload);

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
    }

    public function getById(Request $request, Response $response, array $args): Response
    {
        $data = LivroFactory::getById($args['id'], true);
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
        $livro = LivroFactory::getById($data['id'], true);

        if (!$livro) {
            return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
        }

        try {
            LivroFactory::update($data);
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
        $livro = LivroFactory::getById($args['id'], true);

        if (!$livro) {
            return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
        }

        LivroFactory::delete($args['id']);

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(204);
    }
}
