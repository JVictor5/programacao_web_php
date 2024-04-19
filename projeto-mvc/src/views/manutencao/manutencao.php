<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Manutenção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Inserir Manutenção</h3>
        </div>
        <form action="/manutencao/new" method="post">
            <div class="row mt-4">

                <div class="col-4">
                    <label for="veiculo" class="form-label">Veiculo:</label>
                    <select name="veiculo" id="veiculo" class="form-select">
                        <option value="">Selecione o veiculo</option>
                        <?php foreach ($veiculos as $veiculo): ?>
                            <option value="<?php echo $veiculo['idveiculo']; ?>"><?php echo $veiculo['modelo']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-4">
                    <label for="tipo" class="form-label">Tipo do problema:</label>
                    <input type="text" name="tipo" class="form-control">
                </div>
                <div class="col-4">
                    <label for="data" class="form-label">Data:</label>
                    <input type="date" name="data" class="form-control">
                </div>
                <div class="col-4">
                    <label for="descricao" class="form-label">Descricao:</label>
                    <input type="text" name="descricao" class="form-control">
                </div>

                <div class="row mt-3 text-center">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Inserir</button>
                    </div>
                </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>