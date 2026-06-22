<?php
session_start();
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'admin') {
    header("location: /lpphpadst126/view/home.php");
    exit;
}
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/usuario.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";

$dalUsuario = new DAL\Usuario();
$lstUsuario = $dalUsuario->Select();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="UTF-8"><title>Usuários</title>
</head>
<body class="pink lighten-5">
    <div class="container">
        <h4 class="pink-text text-darken-2">Usuários do Sistema</h4>
        <table class="striped highlight">
            <thead class="pink lighten-3">
                <tr>
                    <th>ID</th><th>Login</th><th>Nome</th><th>Nível</th>
                    <th><a class="btn pink darken-1 btn-small" href="frminsusuario.php">Novo</a></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lstUsuario as $usuario) { ?>
                <tr>
                    <td><?php echo $usuario->getId(); ?></td>
                    <td><?php echo $usuario->getLogin(); ?></td>
                    <td><?php echo $usuario->getNome(); ?></td>
                    <td><?php echo ucfirst($usuario->getNivel()); ?></td>
                    <td>
                        <a class="btn orange btn-small" href="frmedtusuario.php?id=<?php echo $usuario->getId(); ?>">Editar</a>
                        <a class="btn blue btn-small" href="frmdetusuario.php?id=<?php echo $usuario->getId(); ?>">Detalhes</a>
                        <a class="btn red btn-small" onclick="remover(<?php echo $usuario->getId(); ?>)">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<script>
function remover(id) {
    if (confirm('Excluir usuário ' + id + '?')) location.href = 'opremusuario.php?id=' + id;
}
</script>
