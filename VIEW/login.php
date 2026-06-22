<?php
session_start();

require_once __DIR__ . '/../DAL/usuario.php';
require_once __DIR__ . '/../MODEL/usuario.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$login = trim($_POST['usuario'] ?? '');
$senha = $_POST['password'] ?? '';

if ($login === '' || $senha === '') {
    $_SESSION['erro_login'] = 'Informe usuário e senha.';
    header('Location: index.php');
    exit;
}

$hash = md5($senha);
$dalUsuario = new \DAL\Usuario();
$usuario = $dalUsuario->SelectByLogin($login);

if ($usuario && $hash === $usuario->getSenha()) {
    $_SESSION['login'] = $login;
    $_SESSION['nome'] = $usuario->getNome();
    $_SESSION['nivel'] = $usuario->getNivel();
    unset($_SESSION['erro_login']);
    header('Location: home.php');
    exit;
}

$_SESSION['erro_login'] = 'Usuário ou senha inválidos.';
header('Location: index.php');
exit;
