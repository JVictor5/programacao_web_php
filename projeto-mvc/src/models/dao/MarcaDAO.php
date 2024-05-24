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
        try {
            $sql = "SELECT * from marcas";
            return $this->conexao->getConexao()->query($sql);
        } catch (\Exception $e) {
            return 0;
        }
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


    public function update(Marca $marca)
    {
        try {
            $sql = "UPDATE marcas SET marca = :marca, pais = :pais WHERE idmarca = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":marca", $marca->getMarca());
            $p->bindValue(":pais", $marca->getPais());
            $p->bindValue(":id", $marca->getIdMarca());
            return $p->execute();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE from marcas where idmarca = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }
}