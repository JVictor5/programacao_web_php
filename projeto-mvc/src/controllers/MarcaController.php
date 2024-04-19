<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\MarcaDAO;
use Php\Projetomvc\Models\Domain\Marca;

class MarcaController
{
    public function insert($params)
    {
        require_once ("../src/views/marca/marca.php");
    }
    
    public function new($params)
    {
        $marca = new Marca($_POST['marca'], $_POST['pais']);
        $marcaDAO = new MarcaDAO();
        if ($marcaDAO->insert($marca)) {
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }
}