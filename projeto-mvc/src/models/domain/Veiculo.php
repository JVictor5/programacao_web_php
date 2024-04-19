<?php

namespace Php\Projetomvc\Models\Domain;


class Veiculo
{
    private $idveiculo;
    private $idmarca;
    private $proprietario;
    private $modelo;
    private $ano;
    private $cor;

    public function __construct( $idmarca,  $proprietario, $modelo, $ano, $cor)
    {
        $this->setIdMarca($idmarca);
        $this->setProprietario($proprietario);
        $this->setModelo($modelo);
        $this->setAno($ano);
        $this->setCor($cor);
    }

  
    public function getIdVeiculo()
    {
        return $this->idveiculo;
    }

    public function getIdMarca()
    {
        return $this->idmarca;
    }

    public function getProprietario()
    {
        return $this->proprietario;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function setIdMarca( $idmarca)
    {
        $this->idmarca = $idmarca;
    }

    public function setProprietario( $proprietario)
    {
        $this->proprietario = $proprietario;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    public function setCor($cor)
    {
        $this->cor = $cor;
    }
}
?>