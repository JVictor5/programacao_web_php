<?php

namespace Php\Projetomvc\Models\DAO;

use Php\Projetomvc\Models\Domain\Veiculo;

class VeiculoDAO
{
    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao;
    }

    public function insert(Veiculo $veiculo)
    {
        try {
            $sql = "INSERT INTO veiculo (idmarca, proprietario_idproprietario, modelo, ano, cor) VALUES (:marca, :dono, :modelo, :ano, :cor)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":marca", $veiculo->getIdMarca()->getIdMarca());
            $p->bindValue(":dono", $veiculo->getProprietario()->getNome());
            $p->bindValue(":modelo", $veiculo->getModelo());
            $p->bindValue(":ano", $veiculo->getAno());
            $p->bindValue(":cor", $veiculo->getCor());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }
    public function getAll()
    {
        $sql = "SELECT * from veiculo";
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT * from veiculo WHERE idveiculo = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }

}