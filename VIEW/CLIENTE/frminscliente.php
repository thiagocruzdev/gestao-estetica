<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8"><title>Inserir Cliente</title>
</head>
<body class="pink lighten-5">
    <div class="container card-panel pink lighten-5">
        <h4 class="center pink darken-1 white-text card-panel">Inserir Cliente</h4>
        <form action="opinscliente.php" method="POST" class="row">
            <div class="input-field col s10 offset-s1">
                <input type="text" id="nome" name="nome" required><label for="nome">Nome</label>
            </div>
            <div class="input-field col s10 offset-s1">
                <input type="text" id="telefone" name="telefone" required><label for="telefone">Telefone</label>
            </div>
            <div class="input-field col s10 offset-s1">
                <input type="email" id="email" name="email"><label for="email">Email</label>
            </div>
            <div class="input-field col s10 offset-s1">
                <input type="text" id="cpf" name="cpf"><label for="cpf">CPF</label>
            </div>
            <div class="center col s12">
                <button class="btn pink darken-1" type="submit">Salvar <i class="material-icons right">save</i></button>
            </div>
        </form>
    </div>
</body>
</html>
