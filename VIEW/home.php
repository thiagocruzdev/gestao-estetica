<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body class="pink lighten-5">
    <div class="container center" style="margin-top:40px">
        <p class="flow-text grey-text text-darken-1">
            Bem-vindo(a), <strong><?php echo $_SESSION['nome'] ?? $_SESSION['login']; ?></strong>!
        </p>
        <div class="row" style="margin-top:30px">
            <div class="col s12 m4">
                <div class="card pink lighten-4 hoverable">
                    <div class="card-content pink-text text-darken-3">
                        <h5>Clientes</h5>
                        <p>Cadastro e consulta de clientes</p>
                    </div>
                    <div class="card-action">
                        <a href="/lpphpadst126/view/cliente/lstcliente.php">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card pink lighten-4 hoverable">
                    <div class="card-content pink-text text-darken-3">
                        <h5>Produtos</h5>
                        <p>Controle de estoque de produtos</p>
                    </div>
                    <div class="card-action">
                        <a href="/lpphpadst126/view/produto/lstproduto.php">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card pink lighten-4 hoverable">
                    <div class="card-content pink-text text-darken-3">
                        <h5>Serviços</h5>
                        <p>Registro de serviços e produtos usados</p>
                    </div>
                    <div class="card-action">
                        <a href="/lpphpadst126/view/servico/lstservico.php">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
