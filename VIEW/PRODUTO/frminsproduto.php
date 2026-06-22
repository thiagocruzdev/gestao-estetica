<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/lpphpadst126/view/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8"><title>Inserir Produto</title>
</head>
<body class="pink lighten-5">
    <div class="pagina-formulario">
        <div class="card-formulario card-panel">
            <h4 class="center pink darken-1 white-text titulo-formulario">Inserir Produto</h4>
            <form action="opinsproduto.php" method="POST" class="row">
                <div class="input-field col s12">
                    <input type="text" name="descricao" required><label>Descrição</label>
                </div>
                <div class="input-field col s12">
                    <input type="number" name="quantidade" step="0.01" required><label>Quantidade em Estoque</label>
                </div>
                <div class="input-field col s12">
                    <input type="number" name="valor" step="0.01" required><label>Valor Unitário (R$)</label>
                </div>
                <div class="acoes-formulario col s12">
                    <button class="btn pink darken-1" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
