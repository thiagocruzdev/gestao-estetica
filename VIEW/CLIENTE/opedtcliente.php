<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/cliente.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/MODEL/cliente.php";

$cliente = new \MODEL\Cliente();
$cliente->setId($_POST['id']);
$cliente->setNome($_POST['nome']);
$cliente->setTelefone($_POST['telefone']);
$cliente->setEmail($_POST['email'] ?? '');
$cliente->setCpf($_POST['cpf'] ?? '');

$dalCliente = new DAL\Cliente();
$dalCliente->Update($cliente);
header("location: lstcliente.php");
?>
