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
            $p->bindValue(":marca", $veiculo->getIdMarca());
            $p->bindValue(":dono", $veiculo->getProprietario());
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
        try {
            $sql = "SELECT v.*, p.nome AS nome_proprietario, m.marca AS nome_marca FROM veiculo v JOIN proprietario p ON v.proprietario_idproprietario = p.idproprietario JOIN marcas m ON v.idmarca = m.idmarca";
            return $this->conexao->getConexao()->query($sql);
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT v.*, p.nome AS nome_proprietario, m.marca AS nome_marca 
FROM veiculo v 
JOIN proprietario p ON v.proprietario_idproprietario = p.idproprietario 
JOIN marcas m ON v.idmarca = m.idmarca 
WHERE v.idveiculo = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function update(Veiculo $veiculo)
    {
        try {
            $sql = "UPDATE veiculo SET idmarca = :idmarca, proprietario_idproprietario = :proprietario, modelo = :modelo, ano = :ano, cor = :cor WHERE idveiculo = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":idmarca", $veiculo->getIdMarca());
            $p->bindValue(":proprietario", $veiculo->getProprietario());
            $p->bindValue(":modelo", $veiculo->getModelo());
            $p->bindValue(":ano", $veiculo->getAno());
            $p->bindValue(":cor", $veiculo->getCor());
            $p->bindValue(":id", $veiculo->getIdVeiculo());
            return $p->execute();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM veiculo WHERE idveiculo = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }
}
?>