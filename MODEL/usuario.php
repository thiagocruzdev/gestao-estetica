<?php
namespace MODEL;

class Usuario
{
    private ?int $id;
    private ?string $login;
    private ?string $senha;
    private ?string $nome;
    private ?string $nivel;

    public function __construct() {}

    public function getId() { return $this->id; }
    public function setId(int $id) { $this->id = $id; }

    public function getLogin() { return $this->login; }
    public function setLogin(string $login) { $this->login = $login; }

    public function getSenha() { return $this->senha; }
    public function setSenha(string $senha) { $this->senha = $senha; }

    public function getNome() { return $this->nome; }
    public function setNome(string $nome) { $this->nome = $nome; }

    public function getNivel() { return $this->nivel; }
    public function setNivel(string $nivel) { $this->nivel = $nivel; }
}
?>
