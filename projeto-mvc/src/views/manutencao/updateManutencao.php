<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Manutenção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Atualizar Manutenção</h3>
        </div>
        <form action="/manutencao/edit" method="post">
            <input type="hidden" name="id" value="<?= $result["idManutencao"] ?>">
            <div class="row mt-4">
                <div class="col">
                    <label for="veiculo" class="form-label">Veículo:</label>
                    <select name="veiculo" id="veiculo" class="form-select">
                        <option value="">Selecione um veículo</option>
                        <?php foreach ($veiculos as $veiculo): ?>
                            <option value="<?php echo $veiculo['idveiculo']; ?>" <?php if ($veiculo['idveiculo'] == $result['idveiculo'])
                                   echo 'selected'; ?>>
                                <?php echo $veiculo['modelo']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <label for="tipo" class="form-label">Tipo do problema:</label>
                    <input type="text" name="tipo" class="form-control" value="<?= $result["tipo"] ?>">
                </div>
                <div class="col">
                    <label for="data" class="form-label">Data:</label>
                    <input type="date" name="data" class="form-control" value="<?= $result["data"] ?>">
                </div>
                <div class="col">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <input type="text" name="descricao" class="form-control" value="<?= $result["descricao"] ?>">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col text-center">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>