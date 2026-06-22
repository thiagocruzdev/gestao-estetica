<?php
session_start();
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'admin') {
    header("location: /lpphpadst126/view/home.php");
    exit;
}
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/usuario.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/MODEL/usuario.php";

$usuario = new \MODEL\Usuario();
$usuario->setLogin($_POST['login']);
$usuario->setSenha(md5($_POST['senha']));
$usuario->setNome($_POST['nome']);
$usuario->setNivel($_POST['nivel']);

$dalUsuario = new DAL\Usuario();
$dalUsuario->Insert($usuario);
header("location: lstusuario.php");
?>
