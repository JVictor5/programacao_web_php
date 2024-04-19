<?php

namespace Php\Projetomvc\Models\Domain;

class Proprietario
{

    private $idproprietario;
    private $nome;
    private $endereco;
    private $telefone;

    public function __construct($nome, $endereco, $telefone)
    {
        $this->setNome($nome);
        $this->setEndereco($endereco);
        $this->setTelefone($telefone);
    }

    public function getIdProprietario()
    {
        return $this->idproprietario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
}
?>