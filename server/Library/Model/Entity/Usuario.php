<?php

namespace Library\Model\Entity;

use Doctrine\ORM\Mapping as ORM;
use Library\Model\Enum\Status;

#[ORM\Entity]
#[ORM\Table(name: 'Usuario')]
class Usuario
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy:'IDENTITY')]
    private int $id;

    #[ORM\Column(type: 'string', unique: true, nullable:false, length: 9)]
    private string $codigo;

    #[ORM\Column(type: 'string', nullable:false)]
    private string $nome;

    #[ORM\Column(type: 'string', length:13, nullable:false)]
    private string $telefone;

    #[ORM\Column(type: 'string', nullable:false)]
    private string $email;

    #[ORM\Column(type: 'string', enumType: Status::class, nullable: false)]
    private Status $status;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo)
    {
        $this->codigo = $codigo;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status)
    {
        $this->status = $status;
    }
}
