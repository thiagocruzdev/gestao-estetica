<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/lpphpadst126/view/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8"><title>Inserir Cliente</title>
</head>
<body class="pink lighten-5">
    <div class="pagina-formulario">
        <div class="card-formulario card-panel">
            <h4 class="center pink darken-1 white-text titulo-formulario">Inserir Cliente</h4>
            <form action="opinscliente.php" method="POST" class="row">
                <div class="input-field col s12">
                    <input type="text" id="nome" name="nome" required><label for="nome">Nome</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" id="telefone" name="telefone" required><label for="telefone">Telefone</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" id="email" name="email"><label for="email">Email</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" id="cpf" name="cpf"><label for="cpf">CPF</label>
                </div>
                <div class="acoes-formulario col s12">
                    <button class="btn pink darken-1" type="submit">Salvar <i class="material-icons right">save</i></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
