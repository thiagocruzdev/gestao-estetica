<?php
session_start();
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'admin') {
    header("location: /lpphpadst126/view/home.php");
    exit;
}
$id = $_GET['id'];
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/usuario.php";

$dalUsuario = new DAL\Usuario();
$usuario = $dalUsuario->SelectById($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta charset="UTF-8"><title>Detalhes do Usuário</title>
</head>
<body class="pink lighten-5">
    <div class="container card-panel">
        <h4 class="center pink darken-1 white-text card-panel">Detalhes do Usuário</h4>
        <p><strong>ID:</strong> <?php echo $usuario->getId(); ?></p>
        <p><strong>Login:</strong> <?php echo $usuario->getLogin(); ?></p>
        <p><strong>Nome:</strong> <?php echo $usuario->getNome(); ?></p>
        <p><strong>Nível:</strong> <?php echo ucfirst($usuario->getNivel()); ?></p>
        <div class="center">
            <a class="btn grey" href="lstusuario.php">Voltar</a>
            <a class="btn orange" href="frmedtusuario.php?id=<?php echo $usuario->getId(); ?>">Editar</a>
            <a class="btn red" onclick="remover(<?php echo $usuario->getId(); ?>)">Excluir</a>
        </div>
    </div>
</body>
</html>
<script>
function remover(id) {
    if (confirm('Excluir usuário ' + id + '?')) location.href = 'opremusuario.php?id=' + id;
}
</script>
