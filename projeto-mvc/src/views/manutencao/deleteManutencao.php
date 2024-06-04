<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Manutenção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Excluir Manutenção</h3>
        </div>
        <form action="/manutencao/deletar" method="post">
            <input type="hidden" name="id" value="<?= $result["idManutencao"] ?>">
            <div class="row mt-4">
                <div class="col-6">
                    <label for="" class="form-label">Veículo:</label>
                    <input type="text" name="veiculo" class="form-control" value="<?= $result["modelo_veiculo"] ?>">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Tipo do problema:</label>
                    <input type="text" name="tipo" class="form-control" value="<?= $result["tipo"] ?>">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Data:</label>
                    <input type="text" name="data" class="form-control" value="<?= $result["data"] ?>">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Descrição:</label>
                    <input type="text" name="descricao" class="form-control" value="<?= $result["descricao"] ?>">
                </div>
                <div class="row">
                    <div class="col">
                        <p>Você deseja realmente excluir esse registro?</p>
                        <button type="submit" class="btn btn-danger">
                            Excluir
                        </button>
                    </div>
                </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>