<?php
namespace MODEL;

class Produto
{
    private ?int $id;
    private ?string $descricao;
    private ?float $quantidade;
    private ?float $valor;

    public function __construct() {}

    public function getId() { return $this->id; }
    public function setId(int $id) { $this->id = $id; }

    public function getDescricao() { return $this->descricao; }
    public function setDescricao(string $descricao) { $this->descricao = $descricao; }

    public function getQuantidade() { return $this->quantidade; }
    public function setQuantidade(float $quantidade) { $this->quantidade = $quantidade; }

    public function getValor() { return $this->valor; }
    public function setValor(float $valor) { $this->valor = $valor; }
}
?>
