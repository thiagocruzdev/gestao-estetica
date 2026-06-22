<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/cliente.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/MODEL/cliente.php";

$cliente = new \MODEL\Cliente();
$cliente->setNome($_POST['nome']);
$cliente->setTelefone($_POST['telefone']);
$cliente->setEmail($_POST['email'] ?? '');
$cliente->setCpf($_POST['cpf'] ?? '');

$dalCliente = new DAL\Cliente();
$dalCliente->Insert($cliente);
header("location: lstcliente.php");
?>
