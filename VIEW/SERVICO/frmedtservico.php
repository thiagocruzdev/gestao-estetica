<?php
$id = $_GET['id'];
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/view/menu.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/servico.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/cliente.php";

$dalServico = new DAL\Servico();
$servico = $dalServico->SelectById($id);
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
    <meta charset="UTF-8"><title>Editar Serviço</title>
</head>
<body class="pink lighten-5">
    <div class="container card-panel">
        <h4 class="center pink darken-1 white-text card-panel">Editar Serviço</h4>
        <form action="opedtservico.php" method="POST" class="row">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-field col s10 offset-s1">
                <select name="cliente" required>
                    <?php foreach ($lstCliente as $cliente) { ?>
                        <option value="<?php echo $cliente->getId(); ?>" <?php echo ($cliente->getId() == $servico->getCliente()) ? 'selected' : ''; ?>>
                            <?php echo $cliente->getNome(); ?>
                        </option>
                    <?php } ?>
                </select>
                <label>Cliente</label>
            </div>
            <div class="input-field col s10 offset-s1">
                <input type="text" name="descricao" value="<?php echo $servico->getDescricao(); ?>" required><label class="active">Descrição</label>
            </div>
            <div class="input-field col s10 offset-s1">
                <input type="number" name="valor" step="0.01" value="<?php echo $servico->getValor(); ?>" required><label class="active">Valor</label>
            </div>
            <div class="input-field col s10 offset-s1">
                <input type="date" name="data_servico" value="<?php echo $servico->getDataServico(); ?>" required><label class="active">Data</label>
            </div>
            <div class="center col s12">
                <button class="btn pink darken-1" type="submit">Salvar</button>
                <a class="btn grey" href="lstservico.php">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>
