<?php

namespace Php\Projetomvc\Models\DAO;

use Php\Projetomvc\Models\Domain\Marca;

class MarcaDAO
{
    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao;
    }

    public function insert(Marca $marca)
    {
        try {
            $sql = "INSERT INTO marcas (marca, pais) VALUES (:marca, :pais)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":marca", $marca->getMarca());
            $p->bindValue(":pais", $marca->getPais());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }
    public function getAll()
    {
        $sql = "SELECT * from marcas";
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT * from marcas WHERE idmarca = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }

}