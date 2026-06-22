<?php
namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/MODEL/servico.php";

class Servico
{
    public function Select()
    {
        $sql = "SELECT s.*, c.nome AS nome_cliente
                FROM servico s
                INNER JOIN cliente c ON s.cliente = c.id
                ORDER BY s.data_servico DESC;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();
        $lstServico = [];

        foreach ($registros as $linha) {
            $servico = new \MODEL\Servico();
            $servico->setId($linha['id']);
            $servico->setCliente($linha['cliente']);
            $servico->setDescricao($linha['descricao']);
            $servico->setValor($linha['valor']);
            $servico->setDataServico($linha['data_servico']);
            $servico->setNomeCliente($linha['nome_cliente']);
            $lstServico[] = $servico;
        }
        return $lstServico;
    }

    public function SelectById(int $id)
    {
        $sql = "SELECT s.*, c.nome AS nome_cliente
                FROM servico s
                INNER JOIN cliente c ON s.cliente = c.id
                WHERE s.id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $servico = new \MODEL\Servico();
        $servico->setId($linha['id']);
        $servico->setCliente($linha['cliente']);
        $servico->setDescricao($linha['descricao']);
        $servico->setValor($linha['valor']);
        $servico->setDataServico($linha['data_servico']);
        $servico->setNomeCliente($linha['nome_cliente']);
        return $servico;
    }

    public function Insert(\MODEL\Servico $servico)
    {
        $sql = "INSERT INTO servico (cliente, descricao, valor, data_servico) VALUES (?, ?, ?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute([
            $servico->getCliente(),
            $servico->getDescricao(),
            $servico->getValor(),
            $servico->getDataServico()
        ]);
        $id = $con->lastInsertId();
        $con = Conexao::desconectar();
        return $id;
    }

    public function Update(\MODEL\Servico $servico)
    {
        $sql = "UPDATE servico SET cliente=?, descricao=?, valor=?, data_servico=? WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute([
            $servico->getCliente(),
            $servico->getDescricao(),
            $servico->getValor(),
            $servico->getDataServico(),
            $servico->getId()
        ]);
        $con = Conexao::desconectar();
        return $result;
    }

    public function Delete(int $id)
    {
        $sql = "DELETE FROM servico WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();
        return $result;
    }

    public function SelectProdutosByServico(int $servicoId)
    {
        $sql = "SELECT sp.*, p.descricao AS produto_descricao
                FROM servico_produto sp
                INNER JOIN produto p ON sp.produto = p.id
                WHERE sp.servico=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($servicoId));
        $registros = $query->fetchAll(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();
        return $registros;
    }

    public function InsertProduto(int $servicoId, int $produtoId, float $quantidade)
    {
        $sql = "INSERT INTO servico_produto (servico, produto, quantidade) VALUES (?, ?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute([$servicoId, $produtoId, $quantidade]);
        $con = Conexao::desconectar();
        return $result;
    }

    public function DeleteProdutosByServico(int $servicoId)
    {
        $sql = "DELETE FROM servico_produto WHERE servico=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($servicoId));
        $con = Conexao::desconectar();
        return $result;
    }

    public function SelectRelatorio()
    {
        $sql = "SELECT s.id, s.descricao, s.valor, s.data_servico, c.nome AS cliente,
                       GROUP_CONCAT(CONCAT(p.descricao, ' (', sp.quantidade, ')') SEPARATOR ', ') AS produtos_usados
                FROM servico s
                INNER JOIN cliente c ON s.cliente = c.id
                LEFT JOIN servico_produto sp ON sp.servico = s.id
                LEFT JOIN produto p ON sp.produto = p.id
                GROUP BY s.id
                ORDER BY s.data_servico DESC;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();
        return $registros->fetchAll(\PDO::FETCH_ASSOC);
    }
}
?>
