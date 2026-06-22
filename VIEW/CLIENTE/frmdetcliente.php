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
    <link rel="stylesheet" href="/lpphpadst126/view/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="UTF-8"><title>Detalhes do Cliente</title>
</head>
<body class="pink lighten-5">
    <div class="pagina-formulario">
        <div class="card-formulario card-panel">
            <h4 class="center pink darken-1 white-text titulo-formulario">Detalhes do Cliente</h4>
            <div class="detalhes-conteudo">
                <p><strong>ID:</strong> <?php echo $cliente->getId(); ?></p>
                <p><strong>Nome:</strong> <?php echo $cliente->getNome(); ?></p>
                <p><strong>Telefone:</strong> <?php echo $cliente->getTelefone(); ?></p>
                <p><strong>Email:</strong> <?php echo $cliente->getEmail(); ?></p>
                <p><strong>CPF:</strong> <?php echo $cliente->getCpf(); ?></p>
            </div>
            <div class="acoes-formulario">
                <a class="btn grey" href="lstcliente.php">Voltar</a>
                <a class="btn orange" href="frmedtcliente.php?id=<?php echo $cliente->getId(); ?>">Editar</a>
                <a class="btn red" onclick="remover(<?php echo $cliente->getId(); ?>)">Excluir</a>
            </div>
        </div>
    </div>
</body>
</html>
<script>
function remover(id) {
    if (confirm('Excluir cliente ' + id + '?')) location.href = 'opremcliente.php?id=' + id;
}
</script>
