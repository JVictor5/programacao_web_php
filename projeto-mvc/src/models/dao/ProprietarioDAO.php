<?php

namespace Php\Projetomvc\Models\DAO;

use Php\Projetomvc\Models\Domain\Proprietario;


class ProprietarioDAO
{
    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao;
    }

    public function insert(Proprietario $proprietario)
    {
        try {
            $sql = "INSERT INTO proprietario (nome, endereco, telefone) VALUES (:nome, :end, :tele)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $proprietario->getNome());
            $p->bindValue(":end", $proprietario->getEndereco());
            $p->bindValue(":tele", $proprietario->getTelefone());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }
    public function getAll()
    {
        $sql = "SELECT * from proprietario";
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT * from proprietario WHERE idProprietario = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }

}