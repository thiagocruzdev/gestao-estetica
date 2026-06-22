<?php
session_start();
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'admin') {
    header("location: /lpphpadst126/view/home.php");
    exit;
}
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/usuario.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/MODEL/usuario.php";

$dalUsuario = new DAL\Usuario();
$usuarioAtual = $dalUsuario->SelectById($_POST['id']);

$usuario = new \MODEL\Usuario();
$usuario->setId($_POST['id']);
$usuario->setLogin($_POST['login']);
$usuario->setSenha(!empty($_POST['senha']) ? md5($_POST['senha']) : $usuarioAtual->getSenha());
$usuario->setNome($_POST['nome']);
$usuario->setNivel($_POST['nivel']);

$dalUsuario->Update($usuario);
header("location: lstusuario.php");
?>
