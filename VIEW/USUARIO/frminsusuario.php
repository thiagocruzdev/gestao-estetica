<?php
session_start();
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'admin') {
    header("location: /lpphpadst126/view/home.php");
    exit;
}
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/lpphpadst126/view/css/style.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/lpphpadst126/view/js/init.js"></script>
    <meta charset="UTF-8"><title>Inserir Usuário</title>
</head>
<body class="pink lighten-5">
    <div class="pagina-formulario">
        <div class="card-formulario card-panel">
            <h4 class="center pink darken-1 white-text titulo-formulario">Inserir Usuário</h4>
            <form action="opinsusuario.php" method="POST" class="row">
                <div class="input-field col s12">
                    <input type="text" name="login" required><label>Login</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" name="senha" required><label>Senha</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="nome" required><label>Nome</label>
                </div>
                <div class="input-field col s12">
                    <select name="nivel" required>
                        <option value="funcionario" selected>Funcionário</option>
                        <option value="admin">Administrador</option>
                    </select>
                    <label>Nível de Acesso</label>
                </div>
                <div class="acoes-formulario col s12">
                    <button class="btn pink darken-1" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
