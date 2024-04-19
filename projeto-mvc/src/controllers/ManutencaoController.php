<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\VeiculoDAO;
use Php\Projetomvc\Models\DAO\ManutencaoDAO;
use Php\Projetomvc\Models\Domain\Veiculo;
use Php\Projetomvc\Models\Domain\Manutencao;

class ManutencaoController
{
    public function insert($params)
    {
        $veiculoDAO = new VeiculoDAO();
        $veiculos = $veiculoDAO->getAll();
        require_once ("../src/views/manutencao/manutencao.php");
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
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }
}