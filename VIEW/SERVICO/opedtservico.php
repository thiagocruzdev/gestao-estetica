<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/servico.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/MODEL/servico.php";

$servico = new \MODEL\Servico();
$servico->setId($_POST['id']);
$servico->setCliente($_POST['cliente']);
$servico->setDescricao($_POST['descricao']);
$servico->setValor($_POST['valor']);
$servico->setDataServico($_POST['data_servico']);

$dalServico = new DAL\Servico();
$dalServico->Update($servico);
header("location: lstservico.php");
?>
