<?php 

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $path);

#Rotas

$r->get('/olamundo', function(){
    return "Olá mundo!";
} );

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá '.$params[1];
} );

#Rotas

$result = $r->handler();

if(!$result){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $result($r->getParams());
