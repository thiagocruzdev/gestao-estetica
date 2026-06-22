<?php
$id = $_GET['id'];
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/servico.php";

$dalServico = new DAL\Servico();
$servico = $dalServico->SelectById($id);
$produtos = $dalServico->SelectProdutosByServico($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/lpphpadst126/view/css/style.css">
    <meta charset="UTF-8"><title>Detalhes do Serviço</title>
</head>
<body class="pink lighten-5">
    <div class="pagina-formulario">
        <div class="card-formulario card-formulario-largo card-panel">
            <h4 class="center pink darken-1 white-text titulo-formulario">Detalhes do Serviço</h4>
            <div class="detalhes-conteudo">
                <p><strong>ID:</strong> <?php echo $servico->getId(); ?></p>
                <p><strong>Cliente:</strong> <?php echo $servico->getNomeCliente(); ?></p>
                <p><strong>Descrição:</strong> <?php echo $servico->getDescricao(); ?></p>
                <p><strong>Data:</strong> <?php echo date('d/m/Y', strtotime($servico->getDataServico())); ?></p>
                <p><strong>Valor:</strong> R$ <?php echo number_format($servico->getValor(), 2, ',', '.'); ?></p>
            </div>

            <h6 class="pink-text text-darken-2 subtitulo-formulario">Produtos Utilizados</h6>
            <table class="striped centered">
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

            <div class="acoes-formulario">
                <a class="btn grey" href="lstservico.php">Voltar</a>
                <a class="btn orange" href="frmedtservico.php?id=<?php echo $servico->getId(); ?>">Editar</a>
                <a class="btn red" onclick="remover(<?php echo $servico->getId(); ?>)">Excluir</a>
            </div>
        </div>
    </div>
</body>
</html>
<script>
function remover(id) {
    if (confirm('Excluir serviço ' + id + '?')) location.href = 'opremservico.php?id=' + id;
}
</script>
