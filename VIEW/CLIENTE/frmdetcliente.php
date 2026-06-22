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
    <meta charset="UTF-8"><title>Detalhes do Cliente</title>
</head>
<body class="pink lighten-5">
    <div class="container card-panel">
        <h4 class="center pink darken-1 white-text card-panel">Detalhes do Cliente</h4>
        <p><strong>ID:</strong> <?php echo $cliente->getId(); ?></p>
        <p><strong>Nome:</strong> <?php echo $cliente->getNome(); ?></p>
        <p><strong>Telefone:</strong> <?php echo $cliente->getTelefone(); ?></p>
        <p><strong>Email:</strong> <?php echo $cliente->getEmail(); ?></p>
        <p><strong>CPF:</strong> <?php echo $cliente->getCpf(); ?></p>
        <div class="center">
            <a class="btn grey" href="lstcliente.php">Voltar</a>
            <a class="btn orange" href="frmedtcliente.php?id=<?php echo $cliente->getId(); ?>">Editar</a>
            <a class="btn red" onclick="remover(<?php echo $cliente->getId(); ?>)">Excluir</a>
        </div>
    </div>
</body>
</html>
<script>
function remover(id) {
    if (confirm('Excluir cliente ' + id + '?')) location.href = 'opremcliente.php?id=' + id;
}
</script>
