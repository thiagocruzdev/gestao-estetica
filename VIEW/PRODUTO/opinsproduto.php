<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/produto.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/MODEL/produto.php";

$produto = new \MODEL\Produto();
$produto->setDescricao($_POST['descricao']);
$produto->setQuantidade($_POST['quantidade']);
$produto->setValor($_POST['valor']);

$dalProduto = new DAL\Produto();
$dalProduto->Insert($produto);
header("location: lstproduto.php");
?>
