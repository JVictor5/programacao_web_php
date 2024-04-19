<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\VeiculoDAO;
use Php\Projetomvc\Models\DAO\MarcaDAO;
use Php\Projetomvc\Models\DAO\ProprietarioDAO;
use Php\Projetomvc\Models\Domain\Veiculo;
use Php\Projetomvc\Models\Domain\Marca;
use Php\Projetomvc\Models\Domain\Proprietario;

class VeiculoController
{
    public function insert($params)
    {
        $marcaDAO = new MarcaDAO();
        $marcas = $marcaDAO->getAll();
        $proprietarioDAO = new ProprietarioDAO();
        $proprietarios = $proprietarioDAO->getAll();
        require_once ("../src/views/veiculo/veiculo.php");
    }
    public function new($params)
    {
        $marcaDAO = new MarcaDAO();
        $marca = $marcaDAO->getById($_POST['marca']);

        $proprietarioDAO = new ProprietarioDAO();
        $proprietario = $proprietarioDAO->getById($_POST['dono']);

        $veiculo = new Veiculo(
            $_POST['marca'],
            $_POST['dono'],
            $_POST['modelo'],
            $_POST['ano'],
            $_POST['cor']
        );
        $veiculoDAO = new VeiculoDAO();
        if ($veiculoDAO->insert($veiculo)) {
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }
}