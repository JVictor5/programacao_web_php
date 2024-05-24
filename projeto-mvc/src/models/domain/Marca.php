<?php

namespace Php\Projetomvc\Models\Domain;

class Marca
{
    private int $idmarca;
    private string $marca;
    private string $pais;

    public function __construct(string $marca, string $pais)
    {
        $this->setMarca($marca);
        $this->setPais($pais);
    }

    public function getIdMarca()
    {
        return $this->idmarca;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function setIdMarca(int $idmarca)
    {
        $this->idmarca = $idmarca;
    }
    public function setMarca(string $marca)
    {
        $this->marca = $marca;
    }

    public function setPais(string $pais)
    {
        $this->pais = $pais;
    }
}
?>