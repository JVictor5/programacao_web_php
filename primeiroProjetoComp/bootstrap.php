<?php

require __DIR__ . "/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $path);

#Rotas

$r->get('/olamundo', function () {
    return "Olá mundo!";
});

$r->get('/olapessoa/{nome}', function ($params) {
    return 'Olá ' . $params[1];
});

$r->get('/exemplo/formulario', function () {
    include ("exemplo.html");
});

$r->post('/exemplo/resposta', function () {
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "The sum is: {$soma}";
});

$r->get('/exercicio1/formulario', function () {
    include ("exercicio1.html");
});

$r->post('/exercicio1/resposta', function () {
    $number = $_POST['number'];
    if ($number > 0) {
        return "Positive value";
    } else if ($number == 0) {
        return "Equals Zero";
    } else {
        return "negative value";
    }
});

$r->get('/exercicio2/formulario', function () {
    include ("exercicio2.html");
});

$r->post('/exercicio2/resposta', function () {
    $all_numbers = [];
    $all_numbers[] = $_POST['number1'];
    $all_numbers[] = $_POST['number2'];
    $all_numbers[] = $_POST['number3'];
    $all_numbers[] = $_POST['number4'];
    $all_numbers[] = $_POST['number5'];
    $all_numbers[] = $_POST['number6'];
    $all_numbers[] = $_POST['number7'];
    foreach ($all_numbers as $key => $number) {
        if ($key == 0) {
            $lower_value = $number;
            $index_lower_value = $key;
        }
        if ($number < $lower_value) {
            $lower_value = $number;
            $index_lower_value = $key;
        }
    }
    echo "The lowest value is: $lower_value. Its position is: $index_lower_value.";
});

$r->get('/exercicio3/formulario', function () {
    include ("exercicio3.html");
});

$r->post('/exercicio3/resposta', function () {
    $num1 = $_POST['number1'];
    $num2 = $_POST['number2'];
    $sum = $num1 + $num2;

    if ($num1 == $num2) {
        return "Triple the sum is: " . $sum * 3;
    } else {
        echo "total the sum is: $sum";
    }
});

$r->get('/exercicio4/formulario', function () {
    include ("exercicio4.html");
});

$r->post('/exercicio4/resposta', function () {
    $num = $_POST['number'];
    for ($i = 0; $i <= 10; $i++) {
        echo "$num x $i = " . $num * $i . "<br>";
    }

});

$r->get('/exercicio5/formulario', function () {
    include ("exercicio5.html");
});

$r->post('/exercicio5/resposta', function () {
    $num = $_POST['number'];
    $result = 1;

    for ($i = $num; $i > 1; $i--) {
        if ($i == $num) {
            $result = $i * ($i - 1);
        } else {
            $result *= ($i - 1);
        }
    }

    echo "Factorial of $num is: $result";
});

$r->get('/exercicio6/formulario', function () {
    include ("exercicio6.html");
});

$r->post('/exercicio6/resposta', function () {
    $num1 = $_POST['number1'];
    $num2 = $_POST['number2'];

    if ($num1 < $num2) {
        return "$num1 $num2";
    } elseif ($num1 > $num2) {
        return "$num2 $num1";
    } else {
        return "Number equals: $num1";
    }
});

$r->get('/exercicio7/formulario', function () {
    include ("exercicio7.html");
});

$r->post('/exercicio7/resposta', function () {
    $num = $_POST['number'];
    $numCm = $num * 100;
    return "$num meter equals a $numCm centimeters.";
});

$r->get('/exercicio8/formulario', function () {
    include ("exercicio8.html");
});

$r->post('/exercicio8/resposta', function () {
    $area = $_POST['areaParede'];
    $liters = ceil($area / 3);
    $cans = ceil($liters / 18);

    echo "Need for $cans ink cans. total price R$" . $cans * 80 . ".";
});

$r->get('/exercicio9/formulario', function () {
    include ("exercicio9.html");
});

$r->post('/exercicio9/resposta', function () {
    define("CURRENT_YEAR", 2024);
    $yearOfBirth = $_POST['year'];
    $age = CURRENT_YEAR - $yearOfBirth;
    $daysAlive = $age * 365;
    $age2025 = $age + 1;
    $result = [
        "Current age: $age.",
        "Days lived: $daysAlive.",
        "Age in 2025: $age2025."
    ];
    return implode("<br>", $result);
});

$r->get('/exercicio10/formulario', function () {
    include ("exercicio10.html");
});

$r->post('/exercicio10/resposta', function () {
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    $imc = $weight / pow($height, 2);

    if ($imc < 18.5) {
        $result = "underweight";
    } else if ($imc >= 18.5 && $imc <= 24.9) {
        $result = "normal";
    } else if ($imc >= 25 && $imc <= 29.9) {
        $result = "overweight";
    } else if ($imc >= 30 && $imc <= 39.9) {
        $result = "obese";
    } else {
        $result = "severe obesity";
    }

    echo "Your BMI classification falls under: $result.<br>
    For more information, visit the <a href='https://www.tuasaude.com/calculadora/imc/' 
    target='_blank'>page</a>.";
});

#Rotas

$result = $r->handler();

if (!$result) {
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $result($r->getParams());
