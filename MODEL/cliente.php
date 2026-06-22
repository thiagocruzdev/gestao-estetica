<?php
namespace MODEL;

class Cliente
{
    private ?int $id;
    private ?string $nome;
    private ?string $telefone;
    private ?string $email;
    private ?string $cpf;

    public function __construct() {}

    public function getId() { return $this->id; }
    public function setId(int $id) { $this->id = $id; }

    public function getNome() { return $this->nome; }
    public function setNome(string $nome) { $this->nome = $nome; }

    public function getTelefone() { return $this->telefone; }
    public function setTelefone(string $telefone) { $this->telefone = $telefone; }

    public function getEmail() { return $this->email; }
    public function setEmail(?string $email) { $this->email = $email; }

    public function getCpf() { return $this->cpf; }
    public function setCpf(?string $cpf) { $this->cpf = $cpf; }
}
?>
