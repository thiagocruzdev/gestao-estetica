<?php
$id = $_GET['id'];
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/produto.php";

$dalProduto = new DAL\Produto();
$produto = $dalProduto->SelectById($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/lpphpadst126/view/css/style.css">
    <meta charset="UTF-8"><title>Detalhes do Produto</title>
</head>
<body class="pink lighten-5">
    <div class="pagina-formulario">
        <div class="card-formulario card-panel">
            <h4 class="center pink darken-1 white-text titulo-formulario">Detalhes do Produto</h4>
            <div class="detalhes-conteudo">
                <p><strong>ID:</strong> <?php echo $produto->getId(); ?></p>
                <p><strong>Descrição:</strong> <?php echo $produto->getDescricao(); ?></p>
                <p><strong>Estoque:</strong> <?php echo $produto->getQuantidade(); ?></p>
                <p><strong>Valor:</strong> R$ <?php echo number_format($produto->getValor(), 2, ',', '.'); ?></p>
            </div>
            <div class="acoes-formulario">
                <a class="btn grey" href="lstproduto.php">Voltar</a>
                <a class="btn orange" href="frmedtproduto.php?id=<?php echo $produto->getId(); ?>">Editar</a>
                <a class="btn red" onclick="remover(<?php echo $produto->getId(); ?>)">Excluir</a>
            </div>
        </div>
    </div>
</body>
</html>
<script>
function remover(id) {
    if (confirm('Excluir produto ' + id + '?')) location.href = 'opremproduto.php?id=' + id;
}
</script>
