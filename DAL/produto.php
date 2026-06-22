<?php
namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/MODEL/produto.php";

class Produto
{
    public function Select()
    {
        $sql = "SELECT * FROM produto ORDER BY descricao;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();
        $lstProduto = [];

        foreach ($registros as $linha) {
            $produto = new \MODEL\Produto();
            $produto->setId($linha['id']);
            $produto->setDescricao($linha['descricao']);
            $produto->setQuantidade($linha['quantidade']);
            $produto->setValor($linha['valor']);
            $lstProduto[] = $produto;
        }
        return $lstProduto;
    }

    public function SelectById(int $id)
    {
        $sql = "SELECT * FROM produto WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $produto = new \MODEL\Produto();
        $produto->setId($linha['id']);
        $produto->setDescricao($linha['descricao']);
        $produto->setQuantidade($linha['quantidade']);
        $produto->setValor($linha['valor']);
        return $produto;
    }

    public function Insert(\MODEL\Produto $produto)
    {
        $sql = "INSERT INTO produto (descricao, quantidade, valor) VALUES (?, ?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute([
            $produto->getDescricao(),
            $produto->getQuantidade(),
            $produto->getValor()
        ]);
        $con = Conexao::desconectar();
        return $result;
    }

    public function Update(\MODEL\Produto $produto)
    {
        $sql = "UPDATE produto SET descricao=?, quantidade=?, valor=? WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute([
            $produto->getDescricao(),
            $produto->getQuantidade(),
            $produto->getValor(),
            $produto->getId()
        ]);
        $con = Conexao::desconectar();
        return $result;
    }

    public function Delete(int $id)
    {
        $sql = "DELETE FROM produto WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();
        return $result;
    }
}
?>
