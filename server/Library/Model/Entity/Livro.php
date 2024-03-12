<?php

namespace Library\Model\Entity;

use DateTime;
use Library\Model\Enum\Status;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'Livro')]
class Livro
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy:'IDENTITY')]
    private int $id;

    #[ORM\Column(type: 'string', unique: true, nullable:false, length: 13)]
    private ?string $isbn;

    #[ORM\Column(type: 'string', nullable:false)]
    private ?string $titulo;

    #[ORM\Column(type: 'string', nullable:false)]
    private ?string $autor;

    #[ORM\Column(type: 'string', nullable:false)]
    private ?string $editora;

    #[ORM\Column(type: 'date', nullable:false)]
    private ?DateTime $dataPublicacao;

    #[ORM\Column(type: 'string', enumType: Status::class, nullable: false)]
    private Status $status;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }

    public function setAutor(?string $autor): void
    {
        $this->autor = $autor;
    }

    public function getEditora(): string
    {
        return $this->editora;
    }

    public function setEditora(?string $editora): void
    {
        $this->editora = $editora;
    }

    public function getDataPublicacao(): DateTime
    {
        return $this->dataPublicacao;
    }

    public function setDataPublicacao(?DateTime $dataPublicacao): void
    {
        $this->dataPublicacao = $dataPublicacao;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }
}
