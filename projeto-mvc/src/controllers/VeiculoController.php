<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\VeiculoDAO;
use Php\Projetomvc\Models\DAO\MarcaDAO;
use Php\Projetomvc\Models\DAO\ProprietarioDAO;
use Php\Projetomvc\Models\Domain\Veiculo;


class VeiculoController
{
    public function index($params)
    {
        $veiculoDAO = new VeiculoDAO();
        $result = $veiculoDAO->getAll();
        $action = $params[1] ?? "";
        $status = $params[2] ?? "";

        if ($action == "insert" && $status == "true")
            $mensagem = "Registro inserido com sucesso!";
        elseif ($action == "insert" && $status == "false")
            $mensagem = "Erro ao inserir!";
        elseif ($action == "update" && $status == "true")
            $mensagem = "Registro alterado com sucesso!";
        elseif ($action == "update" && $status == "false")
            $mensagem = "Erro ao alterar!";
        elseif ($action == "delete" && $status == "true")
            $mensagem = "Registro excluído com sucesso!";
        elseif ($action == "delete" && $status == "false")
            $mensagem = "Erro ao excluir!";
        else
            $mensagem = "";
        require_once ("../src/views/veiculo/veiculo.php");
    }

    public function insert($params)
    {
        $marcaDAO = new MarcaDAO();
        $proprietarioDAO = new ProprietarioDAO();
        $marcas = $marcaDAO->getAll();
        $proprietarios = $proprietarioDAO->getAll();
        require_once ("../src/views/veiculo/insertVeiculo.php");
    }

    public function new($params)
    {
        $veiculo = new Veiculo($_POST['marca'], $_POST['dono'], $_POST['modelo'], $_POST['ano'], $_POST['cor']);
        $veiculoDAO = new VeiculoDAO();
        if ($veiculoDAO->insert($veiculo)) {
            header("location: /veiculo/insert/true");
        } else {
            header("location: /veiculo/insert/false");
        }
    }

    public function update($params)
    {
        $veiculoDAO = new VeiculoDAO();
        $result = $veiculoDAO->getById($params[1]);
        $marcaDAO = new MarcaDAO();
        $proprietarioDAO = new ProprietarioDAO();
        $marcas = $marcaDAO->getAll();
        $proprietarios = $proprietarioDAO->getAll();
        require_once ("../src/views/veiculo/updateVeiculo.php");
    }

    public function edit($params)
    {
        $veiculo = new Veiculo($_POST['marca'], $_POST['dono'], $_POST['modelo'], $_POST['ano'], $_POST['cor']);
        $veiculo->setIdVeiculo($_POST['id']);
        $veiculoDAO = new VeiculoDAO();
        if ($veiculoDAO->update($veiculo)) {
            header("location: /veiculo/update/true");
        } else {
            header("location: /veiculo/update/false");
        }
    }

    public function delet($params)
    {
        $veiculoDAO = new VeiculoDAO();
        $result = $veiculoDAO->getById($params[1]);
        require_once ("../src/views/veiculo/deleteVeiculo.php");
    }

    public function deletar($params)
    {
        $veiculoDAO = new VeiculoDAO();
        if ($veiculoDAO->delete($_POST['id'])) {
            header("location: /veiculo/delete/true");
        } else {
            header("location: /veiculo/delete/false");
        }
    }
}