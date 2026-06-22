<?php
namespace MODEL;

class Servico
{
    private ?int $id;
    private ?int $cliente;
    private ?string $descricao;
    private ?float $valor;
    private ?string $data_servico;
    private ?string $nome_cliente;

    public function __construct() {}

    public function getId() { return $this->id; }
    public function setId(int $id) { $this->id = $id; }

    public function getCliente() { return $this->cliente; }
    public function setCliente(int $cliente) { $this->cliente = $cliente; }

    public function getDescricao() { return $this->descricao; }
    public function setDescricao(string $descricao) { $this->descricao = $descricao; }

    public function getValor() { return $this->valor; }
    public function setValor(float $valor) { $this->valor = $valor; }

    public function getDataServico() { return $this->data_servico; }
    public function setDataServico(string $data_servico) { $this->data_servico = $data_servico; }

    public function getNomeCliente() { return $this->nome_cliente; }
    public function setNomeCliente(?string $nome_cliente) { $this->nome_cliente = $nome_cliente; }
}
?>
