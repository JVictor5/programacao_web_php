<?php

require __DIR__ . "/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Projetomvc\Router($metodo, $caminho);

$r->get('/marca/insert', 'Php\Projetomvc\Controllers\MarcaController@insert');

$r->post('/marca/new', 'Php\Projetomvc\Controllers\MarcaController@new');

$r->get('/veiculo/insert', 'Php\Projetomvc\Controllers\VeiculoController@insert');

$r->post('/veiculo/new', 'Php\Projetomvc\Controllers\VeiculoController@new');

$r->get('/proprietario/insert', 'Php\Projetomvc\Controllers\ProprietarioController@insert');

$r->post('/proprietario/new', 'Php\Projetomvc\Controllers\ProprietarioController@new');

$r->get('/manutencao/insert', 'Php\Projetomvc\Controllers\ManutencaoController@insert');

$r->post('/manutencao/new', 'Php\Projetomvc\Controllers\ManutencaoController@new');




$resultado = $r->handler();

if (!$resultado) {
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure) {
    echo $resultado($r->getParams());
} elseif (is_string($resultado)) {
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}