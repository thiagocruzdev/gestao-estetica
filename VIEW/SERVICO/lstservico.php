<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/servico.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";

$dalServico = new DAL\Servico();
$lstServico = $dalServico->Select();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="UTF-8"><title>Serviços</title>
</head>
<body class="pink lighten-5">
    <div class="container">
        <h4 class="pink-text text-darken-2">Serviços</h4>
        <table class="striped highlight">
            <thead class="pink lighten-3">
                <tr>
                    <th>ID</th><th>Cliente</th><th>Descrição</th><th>Data</th><th>Valor</th>
                    <th><a class="btn pink darken-1 btn-small" href="frminsservico.php">Novo</a></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lstServico as $servico) { ?>
                <tr>
                    <td><?php echo $servico->getId(); ?></td>
                    <td><?php echo $servico->getNomeCliente(); ?></td>
                    <td><?php echo $servico->getDescricao(); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($servico->getDataServico())); ?></td>
                    <td>R$ <?php echo number_format($servico->getValor(), 2, ',', '.'); ?></td>
                    <td>
                        <a class="btn orange btn-small" href="frmedtservico.php?id=<?php echo $servico->getId(); ?>">Editar</a>
                        <a class="btn blue btn-small" href="frmdetservico.php?id=<?php echo $servico->getId(); ?>">Detalhes</a>
                        <a class="btn red btn-small" onclick="remover(<?php echo $servico->getId(); ?>)">Excluir</a>
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
    if (confirm('Excluir serviço ' + id + '?')) location.href = 'opremservico.php?id=' + id;
}
</script>
