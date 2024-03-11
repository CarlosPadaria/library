<?php

namespace Library\Model\Factory;

use DateTime;
use Doctrine\ORM\EntityManager;
use Library\Model\Entity\Livro;
use Library\Model\Enum\Status;

abstract class LivroFactory
{
    public static EntityManager $em = em;

    public static function add($data)
    {
        $livro = new Livro();
        $livro->setIsbn($data['isbn']);
        $livro->setTitulo($data['titulo']);
        $livro->setAutor($data['autor']);
        $livro->setEditora($data['editora']);
        $livro->setDataPublicacao(new DateTime($data['dataPublicacao']));
        $livro->setStatus(Status::Ativo);

        self::$em->persist($livro);
        self::$em->flush();

        return $livro;
    }

    public static function getAll($toArray = false)
    {
        $query = self::$em
            ->getRepository(Livro::class)
            ->createQueryBuilder('l')
            ->where('l.status = :ativo')
            ->setParameter('ativo', Status::Ativo)
            ->getQuery();

        return $toArray ? $query->getArrayResult() : $query->getResult();
    }

    public static function getById($id, $toArray = false)
    {
        $query = self::$em
        ->getRepository(Livro::class)
        ->createQueryBuilder('l')
        ->where('l.id = :id')
        ->setParameter('id', $id)
        ->getQuery();

        return $toArray ? $query->getArrayResult() : $query->getSingleResult();
    }

    public static function update($data)
    {
        $livro = self::getById($data['id']);
        $livro->setIsbn($data['isbn']);
        $livro->setTitulo($data['titulo']);
        $livro->setAutor($data['autor']);
        $livro->setEditora($data['editora']);
        $livro->setDataPublicacao(new DateTime($data['dataPublicacao']));

        self::$em->flush();
    }

    public static function delete($id)
    {
        $livro = self::getById($id);
        $livro->setStatus(Status::Inativo);

        self::$em->flush();
    }
}
