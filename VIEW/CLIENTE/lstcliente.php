<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/cliente.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/MODEL/cliente.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";

$dalCliente = new DAL\Cliente();

if (isset($_GET['busca_nome']) && !empty($_GET['busca_nome'])) {
    $termo = $_GET['busca_nome'];
    $lstCliente = $dalCliente->SelectByNome($termo);
} else {
    $lstCliente = $dalCliente->Select();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>
</head>
<body class="pink lighten-5">
    <div class="container">
        <h4 class="pink-text text-darken-2">Clientes</h4>
        <div class="row pink lighten-4 black-text card-panel">
            <form action="lstcliente.php" method="get" class="col s12">
                <div class="input-field col s8">
                    <input id="search" type="search" name="busca_nome">
                    <label for="search">Filtrar por nome...</label>
                </div>
                <button class="btn pink darken-1" type="submit">Filtrar <i class="material-icons right">search</i></button>
            </form>
        </div>
        <table class="striped highlight">
            <thead class="pink lighten-3">
                <tr>
                    <th>ID</th><th>Nome</th><th>Telefone</th><th>Email</th><th>CPF</th>
                    <th><a class="btn-floating pink darken-2"><i class="material-icons" onclick="location.href='frminscliente.php'">add</i></a></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lstCliente as $cliente) { ?>
                <tr>
                    <td><?php echo $cliente->getId(); ?></td>
                    <td><?php echo $cliente->getNome(); ?></td>
                    <td><?php echo $cliente->getTelefone(); ?></td>
                    <td><?php echo $cliente->getEmail(); ?></td>
                    <td><?php echo $cliente->getCpf(); ?></td>
                    <td>
                        <a class="btn-floating orange"><i class="material-icons" onclick="location.href='frmedtcliente.php?id=<?php echo $cliente->getId(); ?>'">edit</i></a>
                        <a class="btn-floating blue"><i class="material-icons" onclick="location.href='frmdetcliente.php?id=<?php echo $cliente->getId(); ?>'">visibility</i></a>
                        <a class="btn-floating red"><i class="material-icons" onclick="remover(<?php echo $cliente->getId(); ?>)">delete</i></a>
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
    if (confirm('Excluir cliente ' + id + '?')) location.href = 'opremcliente.php?id=' + id;
}
</script>
