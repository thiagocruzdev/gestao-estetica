<?php
session_start();
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'admin') {
    header("location: /lpphpadst126/view/home.php");
    exit;
}
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/usuario.php";
$dalUsuario = new DAL\Usuario();
$dalUsuario->Delete($_GET['id']);
header("location: lstusuario.php");
?>
