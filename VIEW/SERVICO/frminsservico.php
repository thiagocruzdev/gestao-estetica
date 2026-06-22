<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/cliente.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/produto.php";

$dalCliente = new DAL\Cliente();
$lstCliente = $dalCliente->Select();
$dalProduto = new DAL\Produto();
$lstProduto = $dalProduto->Select();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="/lpphpadst126/view/js/init.js"></script>
    <meta charset="UTF-8"><title>Inserir Serviço</title>
</head>
<body class="pink lighten-5">
    <div class="container card-panel">
        <h4 class="center pink darken-1 white-text card-panel">Inserir Serviço</h4>
        <form action="opinsservico.php" method="POST" class="row">
            <div class="input-field col s10 offset-s1">
                <select name="cliente" required>
                    <option value="" disabled selected>Selecione o cliente</option>
                    <?php foreach ($lstCliente as $cliente) { ?>
                        <option value="<?php echo $cliente->getId(); ?>"><?php echo $cliente->getNome(); ?></option>
                    <?php } ?>
                </select>
                <label>Cliente</label>
            </div>
            <div class="input-field col s10 offset-s1">
                <input type="text" name="descricao" required><label>Descrição do Serviço</label>
            </div>
            <div class="input-field col s10 offset-s1">
                <input type="number" name="valor" step="0.01" required><label>Valor (R$)</label>
            </div>
            <div class="input-field col s10 offset-s1">
                <input type="date" name="data_servico" required value="<?php echo date('Y-m-d'); ?>"><label class="active">Data</label>
            </div>

            <div class="col s10 offset-s1"><h6 class="pink-text text-darken-2">Produtos utilizados no serviço</h6></div>

            <div class="input-field col s6 offset-s1">
                <select name="produto[]">
                    <option value="" selected>Produto 1 (opcional)</option>
                    <?php foreach ($lstProduto as $produto) { ?>
                        <option value="<?php echo $produto->getId(); ?>"><?php echo $produto->getDescricao(); ?> (Est: <?php echo $produto->getQuantidade(); ?>)</option>
                    <?php } ?>
                </select>
                <label>Produto 1</label>
            </div>
            <div class="input-field col s4">
                <input type="number" name="quantidade[]" step="0.01" min="0"><label>Qtd</label>
            </div>

            <div class="input-field col s6 offset-s1">
                <select name="produto[]">
                    <option value="" selected>Produto 2 (opcional)</option>
                    <?php foreach ($lstProduto as $produto) { ?>
                        <option value="<?php echo $produto->getId(); ?>"><?php echo $produto->getDescricao(); ?></option>
                    <?php } ?>
                </select>
                <label>Produto 2</label>
            </div>
            <div class="input-field col s4">
                <input type="number" name="quantidade[]" step="0.01" min="0"><label>Qtd</label>
            </div>

            <div class="input-field col s6 offset-s1">
                <select name="produto[]">
                    <option value="" selected>Produto 3 (opcional)</option>
                    <?php foreach ($lstProduto as $produto) { ?>
                        <option value="<?php echo $produto->getId(); ?>"><?php echo $produto->getDescricao(); ?></option>
                    <?php } ?>
                </select>
                <label>Produto 3</label>
            </div>
            <div class="input-field col s4">
                <input type="number" name="quantidade[]" step="0.01" min="0"><label>Qtd</label>
            </div>

            <div class="center col s12">
                <button class="btn pink darken-1" type="submit">Salvar <i class="material-icons right">save</i></button>
            </div>
        </form>
    </div>
</body>
</html>
