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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="UTF-8"><title>Editar Produto</title>
</head>
<body class="pink lighten-5">
    <div class="pagina-formulario">
        <div class="card-formulario card-panel">
            <h4 class="center pink darken-1 white-text titulo-formulario">Editar Produto</h4>
            <form action="opedtproduto.php" method="POST" class="row">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-field col s12">
                    <input type="text" name="descricao" value="<?php echo $produto->getDescricao(); ?>" required><label class="active">Descrição</label>
                </div>
                <div class="input-field col s12">
                    <input type="number" name="quantidade" step="0.01" value="<?php echo $produto->getQuantidade(); ?>" required><label class="active">Estoque</label>
                </div>
                <div class="input-field col s12">
                    <input type="number" name="valor" step="0.01" value="<?php echo $produto->getValor(); ?>" required><label class="active">Valor (R$)</label>
                </div>
                <div class="acoes-formulario col s12">
                    <button class="btn pink darken-1" type="submit">Salvar</button>
                    <a class="btn grey" href="lstproduto.php">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
