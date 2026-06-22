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
    <link rel="stylesheet" href="/lpphpadst126/view/css/style.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/lpphpadst126/view/js/init.js"></script>
    <meta charset="UTF-8"><title>Editar Usuário</title>
</head>
<body class="pink lighten-5">
    <div class="pagina-formulario">
        <div class="card-formulario card-panel">
            <h4 class="center pink darken-1 white-text titulo-formulario">Editar Usuário</h4>
            <form action="opedtusuario.php" method="POST" class="row">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-field col s12">
                    <input type="text" name="login" value="<?php echo $usuario->getLogin(); ?>" required><label class="active">Login</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" name="senha" placeholder="Deixe em branco para manter"><label>Senha</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="nome" value="<?php echo $usuario->getNome(); ?>" required><label class="active">Nome</label>
                </div>
                <div class="input-field col s12">
                    <select name="nivel" required>
                        <option value="funcionario" <?php echo ($usuario->getNivel() == 'funcionario') ? 'selected' : ''; ?>>Funcionário</option>
                        <option value="admin" <?php echo ($usuario->getNivel() == 'admin') ? 'selected' : ''; ?>>Administrador</option>
                    </select>
                    <label>Nível</label>
                </div>
                <div class="acoes-formulario col s12">
                    <button class="btn pink darken-1" type="submit">Salvar</button>
                    <a class="btn grey" href="lstusuario.php">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
