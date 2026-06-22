<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/produto.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";

$dalProduto = new DAL\Produto();
$lstProduto = $dalProduto->Select();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8"><title>Produtos</title>
</head>
<body class="pink lighten-5">
    <div class="container">
        <h4 class="pink-text text-darken-2">Produtos</h4>
        <table class="striped highlight">
            <thead class="pink lighten-3">
                <tr>
                    <th>ID</th><th>Descrição</th><th>Estoque</th><th>Valor Unit.</th>
                    <th><a class="btn-floating pink darken-2"><i class="material-icons" onclick="location.href='frminsproduto.php'">add</i></a></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lstProduto as $produto) { ?>
                <tr>
                    <td><?php echo $produto->getId(); ?></td>
                    <td><?php echo $produto->getDescricao(); ?></td>
                    <td><?php echo $produto->getQuantidade(); ?></td>
                    <td>R$ <?php echo number_format($produto->getValor(), 2, ',', '.'); ?></td>
                    <td>
                        <a class="btn-floating orange"><i class="material-icons" onclick="location.href='frmedtproduto.php?id=<?php echo $produto->getId(); ?>'">edit</i></a>
                        <a class="btn-floating blue"><i class="material-icons" onclick="location.href='frmdetproduto.php?id=<?php echo $produto->getId(); ?>'">visibility</i></a>
                        <a class="btn-floating red"><i class="material-icons" onclick="remover(<?php echo $produto->getId(); ?>)">delete</i></a>
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
    if (confirm('Excluir produto ' + id + '?')) location.href = 'opremproduto.php?id=' + id;
}
</script>
