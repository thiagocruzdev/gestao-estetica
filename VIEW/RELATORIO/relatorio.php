<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/produto.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/servico.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";

$dalProduto = new DAL\Produto();
$lstProduto = $dalProduto->Select();
$dalServico = new DAL\Servico();
$lstRelatorio = $dalServico->SelectRelatorio();

$totalEstoque = 0;
$totalServicos = 0;
foreach ($lstProduto as $p) {
    $totalEstoque += $p->getQuantidade() * $p->getValor();
}
foreach ($lstRelatorio as $r) {
    $totalServicos += $r['valor'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta charset="UTF-8"><title>Relatórios</title>
</head>
<body class="pink lighten-5">
    <div class="container">
        <h4 class="pink-text text-darken-2 center">Relatórios da Clínica</h4>

        <div class="card-panel pink lighten-4">
            <h5 class="pink-text text-darken-2">Relatório de Produtos</h5>
            <p><strong>Valor total em estoque:</strong> R$ <?php echo number_format($totalEstoque, 2, ',', '.'); ?></p>
            <table class="striped">
                <thead class="pink lighten-3">
                    <tr><th>ID</th><th>Descrição</th><th>Estoque</th><th>Valor Unit.</th><th>Total</th></tr>
                </thead>
                <tbody>
                <?php foreach ($lstProduto as $produto) {
                    $total = $produto->getQuantidade() * $produto->getValor(); ?>
                    <tr>
                        <td><?php echo $produto->getId(); ?></td>
                        <td><?php echo $produto->getDescricao(); ?></td>
                        <td><?php echo $produto->getQuantidade(); ?></td>
                        <td>R$ <?php echo number_format($produto->getValor(), 2, ',', '.'); ?></td>
                        <td>R$ <?php echo number_format($total, 2, ',', '.'); ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="card-panel pink lighten-4" style="margin-top:30px">
            <h5 class="pink-text text-darken-2">Relatório de Serviços</h5>
            <p><strong>Receita total de serviços:</strong> R$ <?php echo number_format($totalServicos, 2, ',', '.'); ?></p>
            <table class="striped">
                <thead class="pink lighten-3">
                    <tr><th>ID</th><th>Cliente</th><th>Serviço</th><th>Data</th><th>Valor</th><th>Produtos Utilizados</th></tr>
                </thead>
                <tbody>
                <?php foreach ($lstRelatorio as $item) { ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['cliente']; ?></td>
                        <td><?php echo $item['descricao']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($item['data_servico'])); ?></td>
                        <td>R$ <?php echo number_format($item['valor'], 2, ',', '.'); ?></td>
                        <td><?php echo $item['produtos_usados'] ?? '—'; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
