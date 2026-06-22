<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/servico.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/produto.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/MODEL/servico.php";

$servico = new \MODEL\Servico();
$servico->setCliente($_POST['cliente']);
$servico->setDescricao($_POST['descricao']);
$servico->setValor($_POST['valor']);
$servico->setDataServico($_POST['data_servico']);

$dalServico = new DAL\Servico();
$dalProduto = new DAL\Produto();

$produtos = $_POST['produto'] ?? [];
$quantidades = $_POST['quantidade'] ?? [];
$podeGravar = true;

for ($i = 0; $i < count($produtos); $i++) {
    if (!empty($produtos[$i]) && !empty($quantidades[$i])) {
        $prod = $dalProduto->SelectById($produtos[$i]);
        if ($prod->getQuantidade() < $quantidades[$i]) {
            $podeGravar = false;
            break;
        }
    }
}

if ($podeGravar) {
    $servicoId = $dalServico->Insert($servico);

    for ($i = 0; $i < count($produtos); $i++) {
        if (!empty($produtos[$i]) && !empty($quantidades[$i])) {
            $prod = $dalProduto->SelectById($produtos[$i]);
            $estoque = $prod->getQuantidade() - $quantidades[$i];
            $prod->setQuantidade($estoque);
            $dalProduto->Update($prod);
            $dalServico->InsertProduto($servicoId, $produtos[$i], $quantidades[$i]);
        }
    }
}

header("location: lstservico.php");
?>
