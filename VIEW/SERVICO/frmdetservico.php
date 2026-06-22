<?php
$id = $_GET['id'];
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/servico.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/cliente.php";

$dalServico = new DAL\Servico();
$servico = $dalServico->SelectById($id);
$produtos = $dalServico->SelectProdutosByServico($id);

$dalCliente = new DAL\Cliente();
$lstCliente = $dalCliente->Select();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="/lpphpadst126/view/js/init.js"></script>
    <meta charset="UTF-8"><title>Detalhes do Serviço</title>
</head>
<body class="pink lighten-5">
    <div class="container card-panel">
        <h4 class="center pink darken-1 white-text card-panel">Detalhes do Serviço</h4>
        <p><strong>ID:</strong> <?php echo $servico->getId(); ?></p>
        <p><strong>Cliente:</strong> <?php echo $servico->getNomeCliente(); ?></p>
        <p><strong>Descrição:</strong> <?php echo $servico->getDescricao(); ?></p>
        <p><strong>Data:</strong> <?php echo date('d/m/Y', strtotime($servico->getDataServico())); ?></p>
        <p><strong>Valor:</strong> R$ <?php echo number_format($servico->getValor(), 2, ',', '.'); ?></p>

        <h5 class="pink-text text-darken-2">Produtos Utilizados</h5>
        <table class="striped">
            <thead class="pink lighten-4"><tr><th>Produto</th><th>Quantidade</th></tr></thead>
            <tbody>
            <?php if (count($produtos) > 0) {
                foreach ($produtos as $p) { ?>
                <tr><td><?php echo $p['produto_descricao']; ?></td><td><?php echo $p['quantidade']; ?></td></tr>
            <?php } } else { ?>
                <tr><td colspan="2">Nenhum produto vinculado</td></tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="center" style="margin-top:20px">
            <a class="btn grey" href="lstservico.php">Voltar</a>
            <a class="btn orange" href="frmedtservico.php?id=<?php echo $servico->getId(); ?>">Editar</a>
            <a class="btn red" onclick="remover(<?php echo $servico->getId(); ?>)">Excluir</a>
        </div>
    </div>
</body>
</html>
<script>
function remover(id) {
    if (confirm('Excluir serviço ' + id + '?')) location.href = 'opremservico.php?id=' + id;
}
</script>
