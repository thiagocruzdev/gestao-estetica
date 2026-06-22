<?php
$id = $_GET['id'];
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/cliente.php";

$dalCliente = new DAL\Cliente();
$cliente = $dalCliente->SelectById($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8"><title>Editar Cliente</title>
</head>
<body class="pink lighten-5">
    <div class="container card-panel">
        <h4 class="center pink darken-1 white-text card-panel">Editar Cliente</h4>
        <form action="opedtcliente.php" method="POST" class="row">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-field col s10 offset-s1">
                <input type="text" name="nome" value="<?php echo $cliente->getNome(); ?>" required><label class="active">Nome</label>
            </div>
            <div class="input-field col s10 offset-s1">
                <input type="text" name="telefone" value="<?php echo $cliente->getTelefone(); ?>" required><label class="active">Telefone</label>
            </div>
            <div class="input-field col s10 offset-s1">
                <input type="email" name="email" value="<?php echo $cliente->getEmail(); ?>"><label class="active">Email</label>
            </div>
            <div class="input-field col s10 offset-s1">
                <input type="text" name="cpf" value="<?php echo $cliente->getCpf(); ?>"><label class="active">CPF</label>
            </div>
            <div class="center col s12">
                <button class="btn pink darken-1" type="submit">Salvar</button>
                <a class="btn grey" href="lstcliente.php">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>
