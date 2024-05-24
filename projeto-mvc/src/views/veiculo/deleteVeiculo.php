<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Veículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Excluir Veículo</h3>
        </div>
        <form action="/veiculo/deletar" method="post">
            <input type="hidden" name="id" value="<?= $result["idveiculo"] ?>">
            <div class="row mt-4">
                <div class="col">
                    <label for="" class="form-label">Proprietário:</label>
                    <input type="text" name="proprietario" class="form-control"
                        value="<?= $result["nome_proprietario"] ?>" readonly>
                </div>
                <div class="col">
                    <label for="" class="form-label">Modelo:</label>
                    <input type="text" name="modelo" class="form-control" value="<?= $result["modelo"] ?>" readonly>
                </div>
                <div class="col">
                    <label for="" class="form-label">Ano:</label>
                    <input type="text" name="ano" class="form-control" value="<?= $result["ano"] ?>" readonly>
                </div>
                <div class="col">
                    <label for="" class="form-label">Cor:</label>
                    <input type="text" name="cor" class="form-control" value="<?= $result["cor"] ?>" readonly>
                </div>
                <div class="col">
                    <label for="" class="form-label">Marca:</label>
                    <input type="text" name="marca" class="form-control" value="<?= $result["nome_marca"] ?>" readonly>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <p>Você realmente deseja excluir este veículo?</p>
                    <button type="submit" class="btn btn-danger">
                        Excluir
                    </button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>