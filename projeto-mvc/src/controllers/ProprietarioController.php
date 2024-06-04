<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\ProprietarioDAO;
use Php\Projetomvc\Models\Domain\Proprietario;

class ProprietarioController
{
    public function index($params)
    {
        $proprietarioDAO = new ProprietarioDAO();
        $result = $proprietarioDAO->getAll();
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
        require_once ("../src/views/proprietario/proprietario.php");
    }
    public function insert($params)
    {
        require_once ("../src/views/proprietario/insertProprietario.php");
    }

    public function new($params)
    {
        $proprietario = new Proprietario($_POST['nome'], $_POST['end'], $_POST['tele']);
        $proprietarioDAO = new ProprietarioDAO();
        if ($proprietarioDAO->insert($proprietario)) {
            header("location: /proprietario/insert/true");
        } else {
            header("location: /proprietario/insert/true");
        }
    }

    public function update($params)
    {
        $proprietarioDAO = new ProprietarioDAO();
        $result = $proprietarioDAO->getById($params[1]);
        require_once ("../src/views/proprietario/updateProprietario.php");
    }

    public function edit($params)
    {
        $proprietario = new Proprietario($_POST['nome'], $_POST['end'], $_POST['tele']);
        $proprietario->setId($_POST['id']);
        $proprietarioDAO = new ProprietarioDAO();
        if ($proprietarioDAO->update($proprietario)) {
            header("location: /proprietario/insert/true");
        } else {
            header("location: /proprietario/insert/true");
        }
    }
    public function delet($params)
    {
        $proprietarioDAO = new ProprietarioDAO();
        $result = $proprietarioDAO->getById($params[1]);
        require_once ("../src/views/proprietario/deleteProprietario.php");
    }

    public function deletar($params)
    {
        $proprietarioDAO = new ProprietarioDAO();
        if ($proprietarioDAO->delete($_POST['id'])) {
            header("location: /proprietario/delete/true");
        } else {
            header("location: /proprietario/delete/false");
        }
    }
}