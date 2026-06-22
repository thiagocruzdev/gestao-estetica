<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/produto.php";
$dalProduto = new DAL\Produto();
$dalProduto->Delete($_GET['id']);
header("location: lstproduto.php");
?>
