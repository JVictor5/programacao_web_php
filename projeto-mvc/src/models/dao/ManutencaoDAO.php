<?php

namespace Php\Projetomvc\Models\DAO;

use Php\Projetomvc\Models\Domain\Manutencao;


class ManutencaoDAO
{
    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao;
    }

    public function insert(Manutencao $manutencao)
    {
        try {
            $sql = "INSERT INTO  Manutencao (idveiculo, tipo, data, descricao) VALUES (:idveiculo, :tipo, :data, :descricao)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":idveiculo", $manutencao->getIdVeiculo());
            $p->bindValue(":tipo", $manutencao->getTipo());
            $p->bindValue(":data", $manutencao->getData());
            $p->bindValue(":descricao", $manutencao->getDescricao());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }
    public function getAll()
    {
        $sql = "SELECT * from manutencao";
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT * from manutencao WHERE idmanutencao = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }

}