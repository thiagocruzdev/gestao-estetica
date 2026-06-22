<?php
namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/MODEL/cliente.php";

class Cliente
{
    public function Select()
    {
        $sql = "SELECT * FROM cliente ORDER BY nome;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();
        $lstCliente = [];

        foreach ($registros as $linha) {
            $cliente = new \MODEL\Cliente();
            $cliente->setId($linha['id']);
            $cliente->setNome($linha['nome']);
            $cliente->setTelefone($linha['telefone']);
            $cliente->setEmail($linha['email']);
            $cliente->setCpf($linha['cpf']);
            $lstCliente[] = $cliente;
        }
        return $lstCliente;
    }

    public function SelectById(int $id)
    {
        $sql = "SELECT * FROM cliente WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $cliente = new \MODEL\Cliente();
        $cliente->setId($linha['id']);
        $cliente->setNome($linha['nome']);
        $cliente->setTelefone($linha['telefone']);
        $cliente->setEmail($linha['email']);
        $cliente->setCpf($linha['cpf']);
        return $cliente;
    }

    public function SelectByNome(string $nome)
    {
        $sql = "SELECT * FROM cliente WHERE nome LIKE ? ORDER BY nome;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(['%' . $nome . '%']);
        $registros = $query->fetchAll(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();
        $lstCliente = [];

        foreach ($registros as $linha) {
            $cliente = new \MODEL\Cliente();
            $cliente->setId($linha['id']);
            $cliente->setNome($linha['nome']);
            $cliente->setTelefone($linha['telefone']);
            $cliente->setEmail($linha['email']);
            $cliente->setCpf($linha['cpf']);
            $lstCliente[] = $cliente;
        }
        return $lstCliente;
    }

    public function Insert(\MODEL\Cliente $cliente)
    {
        $sql = "INSERT INTO cliente (nome, telefone, email, cpf) VALUES (?, ?, ?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute([
            $cliente->getNome(),
            $cliente->getTelefone(),
            $cliente->getEmail(),
            $cliente->getCpf()
        ]);
        $con = Conexao::desconectar();
        return $result;
    }

    public function Update(\MODEL\Cliente $cliente)
    {
        $sql = "UPDATE cliente SET nome=?, telefone=?, email=?, cpf=? WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute([
            $cliente->getNome(),
            $cliente->getTelefone(),
            $cliente->getEmail(),
            $cliente->getCpf(),
            $cliente->getId()
        ]);
        $con = Conexao::desconectar();
        return $result;
    }

    public function Delete(int $id)
    {
        $sql = "DELETE FROM cliente WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();
        return $result;
    }
}
?>
