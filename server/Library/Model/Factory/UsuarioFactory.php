<?php

namespace Library\Model\Factory;

use Doctrine\ORM\EntityManager;
use Library\Model\Entity\Usuario;
use Library\Model\Enum\Status;

abstract class UsuarioFactory
{
    public static EntityManager $em = em;

    public static function add($data)
    {
        $usuario = new Usuario();

        $usuario->setCodigo(self::gerarCodigo());
        $usuario->setNome($data['nome']);
        $usuario->setTelefone($data['telefone']);
        $usuario->setEmail($data['email']);
        $usuario->setStatus(Status::Ativo);

        self::$em->persist($usuario);
        self::$em->flush();

        return $usuario;
    }

    public static function getAll($toArray = false)
    {
        $query = self::$em
            ->getRepository(Usuario::class)
            ->createQueryBuilder('u')
            ->where('u.status = :ativo')
            ->setParameter('ativo', Status::Ativo)
            ->getQuery();

        return $toArray ? $query->getArrayResult() : $query->getResult();
    }

    public static function getById($id, $toArray = false)
    {
        $query = self::$em
        ->getRepository(Usuario::class)
        ->createQueryBuilder('u')
        ->where('u.id = :id')
        ->setParameter('id', $id)
        ->getQuery();

        return $toArray ? $query->getArrayResult() : $query->getSingleResult();
    }

    public static function update($data)
    {
        $usuario = self::getById($data['id']);
        $usuario->setNome($data['nome']);
        $usuario->setTelefone($data['telefone']);
        $usuario->setEmail($data['email']);


        self::$em->flush();
    }

    public static function delete($id)
    {
        $usuario = self::getById($id);
        $usuario->setStatus(Status::Inativo);

        self::$em->flush();
    }

    private static function gerarCodigo()
    {
        while (true) {
            $codigo = 'U' . rand(10000000, 99999999);
            $item = self::$em->getRepository(Usuario::class)->findOneBy(['codigo' => $codigo]);

            if (!$item) {
                return $codigo;
            }
        }
    }
}
