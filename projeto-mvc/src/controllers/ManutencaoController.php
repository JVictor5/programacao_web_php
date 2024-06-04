<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\ManutencaoDAO;
use Php\Projetomvc\Models\DAO\VeiculoDAO;
use Php\Projetomvc\Models\Domain\Manutencao;

class ManutencaoController
{
    public function index($params)
    {
        $manutencaoDAO = new ManutencaoDAO();
        $result = $manutencaoDAO->getAll();
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
        require_once ("../src/views/manutencao/manutencao.php");
    }

    public function insert($params)
    {
        $veiculoDAO = new VeiculoDAO();
        $veiculos = $veiculoDAO->getAll();
        require_once ("../src/views/manutencao/insertManutencao.php");
    }

    public function new($params)
    {
        $veiculoDAO = new VeiculoDAO();
        $veiculo = $veiculoDAO->getById($_POST['veiculo']);

        $manutencao = new Manutencao(
            $veiculo['idveiculo'],
            $_POST['tipo'],
            $_POST['data'],
            $_POST['descricao']
        );
        $manutencaoDAO = new ManutencaoDAO();
        if ($manutencaoDAO->insert($manutencao)) {
            header("location: /manutencao/insert/true");
        } else {
            header("location: /manutencao/insert/false");
        }
    }

    public function update($params)
    {
        $manutencaoDAO = new ManutencaoDAO();
        $result = $manutencaoDAO->getById($params[1]);
        $veiculoDAO = new VeiculoDAO();
        $veiculos = $veiculoDAO->getAll();
        require_once ("../src/views/manutencao/updateManutencao.php");
    }

    public function edit($params)
    {
        $veiculoDAO = new VeiculoDAO();
        $veiculo = $veiculoDAO->getById($_POST['veiculo']);

        $manutencao = new Manutencao(
            $veiculo['idveiculo'],
            $_POST['tipo'],
            $_POST['data'],
            $_POST['descricao']
        );
        $manutencao->setId($_POST['id']);
        $manutencaoDAO = new ManutencaoDAO();
        if ($manutencaoDAO->update($manutencao)) {
            header("location: /manutencao/update/true");
        } else {
            header("location: /manutencao/update/false");
        }
    }

    public function delet($params)
    {
        $manutencaoDAO = new ManutencaoDAO();
        $result = $manutencaoDAO->getById($params[1]);
        require_once ("../src/views/manutencao/deleteManutencao.php");
    }

    public function deletar($params)
    {
        $manutencaoDAO = new ManutencaoDAO();
        if ($manutencaoDAO->delete($_POST['id'])) {
            header("location: /manutencao/delete/true");
        } else {
            header("location: /manutencao/delete/false");
        }
    }
}

?>