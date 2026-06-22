<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/servico.php";
$dalServico = new DAL\Servico();
$dalServico->Delete($_GET['id']);
header("location: lstservico.php");
?>
