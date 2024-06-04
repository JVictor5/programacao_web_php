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
            $sql = "INSERT INTO manutencao (idveiculo, tipo, data, descricao) VALUES (:idveiculo, :tipo, :data, :descricao)";
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
        try {
            $sql = "SELECT m.*, v.modelo AS modelo_veiculo FROM manutencao m JOIN veiculo v ON m.idveiculo = v.idveiculo";
            return $this->conexao->getConexao()->query($sql);
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT m.*, v.modelo AS modelo_veiculo 
FROM manutencao m 
JOIN veiculo v ON m.idveiculo = v.idveiculo 
WHERE m.idmanutencao = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function update(Manutencao $manutencao)
    {
        try {
            $sql = "UPDATE manutencao SET idveiculo = :idveiculo, tipo = :tipo, data = :data, descricao = :descricao WHERE idmanutencao = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":idveiculo", $manutencao->getIdVeiculo());
            $p->bindValue(":tipo", $manutencao->getTipo());
            $p->bindValue(":data", $manutencao->getData());
            $p->bindValue(":descricao", $manutencao->getDescricao());
            $p->bindValue(":id", $manutencao->getIdManutencao());
            return $p->execute();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM manutencao WHERE idmanutencao = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }
}
?>