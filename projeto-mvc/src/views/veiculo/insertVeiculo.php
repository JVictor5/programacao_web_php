<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Veiculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Inserir Veiculo</h3>
        </div>
        <form action="/veiculo/new" method="post">
            <div class="row mt-4">

                <div class="col-4">
                    <label for="marca" class="form-label">Marca:</label>
                    <select name="marca" id="marca" class="form-select">
                        <option value="">Selecione uma marca</option>
                        <?php foreach ($marcas as $marca): ?>
                            <option value="<?php echo $marca['idmarca']; ?>"><?php echo $marca['marca']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-4">
                    <label for="dono" class="form-label">Proprietario:</label>
                    <select name="dono" id="dono" class="form-select">
                        <option value="">Selecione um proprietário</option>
                        <?php foreach ($proprietarios as $proprietario): ?>
                            <option value="<?php echo $proprietario['idproprietario']; ?>">
                                <?php echo $proprietario['nome']; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="col-4">
                    <label for="modelo" class="form-label">Modelo:</label>
                    <input type="text" name="modelo" class="form-control">
                </div>
                <div class="col-4">
                    <label for="ano" class="form-label">Ano:</label>
                    <input type="text" name="ano" class="form-control">
                </div>
                <div class="col-4">
                    <label for="cor" class="form-label">Cor:</label>
                    <input type="text" name="cor" class="form-control">
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