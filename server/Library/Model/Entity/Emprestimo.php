<?php

namespace Library\Model\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'Emprestimo')]
class Emprestimo
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy:'IDENTITY')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Livro::class)]
    private Livro $livro;

    #[ORM\ManyToOne(targetEntity: Usuario::class)]
    private Usuario $usuario;

    #[ORM\Column(type: 'datetime', nullable:false)]
    private DateTime $dataEmprestimo;

    #[ORM\Column(type: 'datetime', nullable:true)]
    private ?DateTime $dataRetorno = null;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLivro(): Livro
    {
        return $this->livro;
    }

    public function setLivro(Livro $livro): void
    {
        $this->livro = $livro;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario): void
    {
        $this->usuario = $usuario;
    }

    public function getDataEmprestimo(): DateTime
    {
        return $this->dataEmprestimo;
    }

    public function setDataEmprestimo(DateTime $dataEmprestimo): void
    {
        $this->dataEmprestimo = $dataEmprestimo;
    }

    public function getDataRetorno(): ?DateTime
    {
        return $this->dataRetorno;
    }

    public function setDataRetorno(DateTime $dataRetorno): void
    {
        $this->dataRetorno = $dataRetorno;
    }
}
