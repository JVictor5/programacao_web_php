<?php

require __DIR__ . "/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Projetomvc\Router($metodo, $caminho);

// ---------- Marca ----------

$r->get('/marca', 'Php\Projetomvc\Controllers\MarcaController@index');

$r->get('/marca/{action}/{status}', 'Php\Projetomvc\Controllers\MarcaController@index');

$r->get('/marca/insert', 'Php\Projetomvc\Controllers\MarcaController@insert');

$r->post('/marca/new', 'Php\Projetomvc\Controllers\MarcaController@new');

$r->get('/marca/update/id/{id}', 'Php\Projetomvc\Controllers\MarcaController@update');

$r->post('/marca/edit', 'Php\Projetomvc\Controllers\MarcaController@edit');

$r->get('/marca/delet/id/{id}', 'Php\Projetomvc\Controllers\MarcaController@delet');

$r->post('/marca/deletar', 'Php\Projetomvc\Controllers\MarcaController@deletar');

// ---------- Veiculo ----------

$r->get('/veiculo', 'Php\Projetomvc\Controllers\VeiculoController@index');

$r->get('/veiculo/{action}/{status}', 'Php\Projetomvc\Controllers\VeiculoController@index');

$r->get('/veiculo/insert', 'Php\Projetomvc\Controllers\VeiculoController@insert');

$r->post('/veiculo/new', 'Php\Projetomvc\Controllers\VeiculoController@new');

$r->get('/veiculo/update/id/{id}', 'Php\Projetomvc\Controllers\VeiculoController@update');

$r->post('/veiculo/edit', 'Php\Projetomvc\Controllers\VeiculoController@edit');

$r->get('/veiculo/delet/id/{id}', 'Php\Projetomvc\Controllers\VeiculoController@delet');

$r->post('/veiculo/deletar', 'Php\Projetomvc\Controllers\VeiculoController@deletar');

// ---------- Proprietario ----------

$r->get('/proprietario', 'Php\Projetomvc\Controllers\ProprietarioController@index');

$r->get('/proprietario/{action}/{status}', 'Php\Projetomvc\Controllers\ProprietarioController@index');

$r->get('/proprietario/insert', 'Php\Projetomvc\Controllers\ProprietarioController@insert');

$r->post('/proprietario/new', 'Php\Projetomvc\Controllers\ProprietarioController@new');

$r->get('/proprietario/update/id/{id}', 'Php\Projetomvc\Controllers\ProprietarioController@update');

$r->post('/proprietario/edit', 'Php\Projetomvc\Controllers\ProprietarioController@edit');

$r->get('/proprietario/delet/id/{id}', 'Php\Projetomvc\Controllers\ProprietarioController@delet');

$r->post('/proprietario/deletar', 'Php\Projetomvc\Controllers\ProprietarioController@deletar');


// ---------- Manutencao ----------
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