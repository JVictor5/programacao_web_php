<?php

namespace Php\Projetomvc\Models\Domain;

class Manutencao
{

    private $idManutencao;
    private $idVeiculo;
    private $tipo;
    private $data;
    private $descricao;

    public function __construct($idVeiculo, $tipo, $data, $descricao)
    {
        $this->setIdVeiculo($idVeiculo);
        $this->setTipo($tipo);
        $this->setData($data);
        $this->setDescricao($descricao);
    }

    public function getIdManutencao()
    {
        return $this->idManutencao;
    }

    public function getIdVeiculo()
    {
        return $this->idVeiculo;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setId($idManutencao)
    {
        $this->idManutencao = $idManutencao;
    }

    public function setIdVeiculo($idVeiculo)
    {
        $this->idVeiculo = $idVeiculo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
}
?>