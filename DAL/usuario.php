<?php
namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/lpphpadst126/MODEL/usuario.php";

class Usuario
{
    public function SelectByLogin(string $login)
    {
        $sql = "SELECT * FROM usuario WHERE login=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($login));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        if (!$linha) return null;

        $usuario = new \MODEL\Usuario();
        $usuario->setId($linha['id']);
        $usuario->setLogin($linha['login']);
        $usuario->setSenha($linha['senha']);
        $usuario->setNome($linha['nome']);
        $usuario->setNivel($linha['nivel']);
        return $usuario;
    }

    public function Select()
    {
        $sql = "SELECT * FROM usuario ORDER BY nome;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();
        $lstUsuario = [];

        foreach ($registros as $linha) {
            $usuario = new \MODEL\Usuario();
            $usuario->setId($linha['id']);
            $usuario->setLogin($linha['login']);
            $usuario->setSenha($linha['senha']);
            $usuario->setNome($linha['nome']);
            $usuario->setNivel($linha['nivel']);
            $lstUsuario[] = $usuario;
        }
        return $lstUsuario;
    }

    public function SelectById(int $id)
    {
        $sql = "SELECT * FROM usuario WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $usuario = new \MODEL\Usuario();
        $usuario->setId($linha['id']);
        $usuario->setLogin($linha['login']);
        $usuario->setSenha($linha['senha']);
        $usuario->setNome($linha['nome']);
        $usuario->setNivel($linha['nivel']);
        return $usuario;
    }

    public function Insert(\MODEL\Usuario $usuario)
    {
        $sql = "INSERT INTO usuario (login, senha, nome, nivel) VALUES (?, ?, ?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute([
            $usuario->getLogin(),
            $usuario->getSenha(),
            $usuario->getNome(),
            $usuario->getNivel()
        ]);
        $con = Conexao::desconectar();
        return $result;
    }

    public function Update(\MODEL\Usuario $usuario)
    {
        $sql = "UPDATE usuario SET login=?, senha=?, nome=?, nivel=? WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute([
            $usuario->getLogin(),
            $usuario->getSenha(),
            $usuario->getNome(),
            $usuario->getNivel(),
            $usuario->getId()
        ]);
        $con = Conexao::desconectar();
        return $result;
    }

    public function Delete(int $id)
    {
        $sql = "DELETE FROM usuario WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();
        return $result;
    }
}
