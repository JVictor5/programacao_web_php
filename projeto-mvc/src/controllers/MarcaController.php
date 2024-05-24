<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\MarcaDAO;
use Php\Projetomvc\Models\Domain\Marca;

class MarcaController
{
    public function index($params)
    {
        $marcaDAO = new MarcaDAO();
        $result = $marcaDAO->getAll();
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
        elseif ($action == "excluir" && $status == "true")
            $mensagem = "Registro excluído com sucesso!";
        elseif ($action == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!";
        else
            $mensagem = "";
        require_once ("../src/views/marca/marca.php");
    }
    public function insert($params)
    {
        require_once ("../src/views/marca/insertMarca.php");
    }

    public function new($params)
    {
        $marca = new Marca($_POST['marca'], $_POST['pais']);
        $marcaDAO = new MarcaDAO();
        if ($marcaDAO->insert($marca)) {
            header("location: /marca/insert/true");
        } else {
            header("location: /marca/insert/false");
        }
    }

    public function update($params)
    {
        $marcaDAO = new MarcaDAO();
        $result = $marcaDAO->getById($params[1]);
        require_once ("../src/views/marca/updateMarca.php");
    }

    public function edit($params)
    {
        $marca = new Marca($_POST['marca'], $_POST['pais']);
        $marca->setIdMarca($_POST['id']);
        $marcaDAO = new MarcaDAO();
        if ($marcaDAO->update($marca)) {
            header("location: /marca/update/true");
        } else {
            header("location: /marca/update/false");
        }
    }

    public function delet($params)
    {
        $marcaDAO = new MarcaDAO();
        $result = $marcaDAO->getById($params[1]);
        require_once ("../src/Views/marca/deleteMarca.php");
    }

    public function deletar($params)
    {
        $marcaDAO = new MarcaDAO();
        if ($marcaDAO->delete($_POST['id'])) {
            header("location: /marca/excluir/true");
        } else {
            header("location: /marca/excluir/false");
        }
    }
}