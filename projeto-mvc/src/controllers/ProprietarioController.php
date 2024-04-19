<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\ProprietarioDAO;
use Php\Projetomvc\Models\Domain\Proprietario;

class ProprietarioController
{
    public function insert($params)
    {
        require_once ("../src/views/proprietario/proprietario.php");
    }

    public function new($params)
    {
        $proprietario = new Proprietario($_POST['nome'], $_POST['end'], $_POST['tele']);
        $proprietarioDAO = new ProprietarioDAO();
        if ($proprietarioDAO->insert($proprietario)) {
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }
}