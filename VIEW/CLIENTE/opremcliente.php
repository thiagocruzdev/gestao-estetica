<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/cliente.php";
$id = $_GET['id'];
$dalCliente = new DAL\Cliente();
$dalCliente->Delete($id);
header("location: lstcliente.php");
?>
