<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Veículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Atualizar Veículo</h3>
        </div>
        <form action="/veiculo/edit" method="post">
            <input type="hidden" name="id" value="<?= $result["idveiculo"] ?>">
            <div class="row mt-4">
                <div class="col">
                    <label for="dono" class="form-label">Proprietário:</label>
                    <select name="dono" id="dono" class="form-select">
                        <option value="">Selecione um proprietário</option>
                        <?php foreach ($proprietarios as $proprietario): ?>
                            <option value="<?php echo $proprietario['idproprietario']; ?>" <?php if ($proprietario['idproprietario'] == $result['proprietario_idproprietario']) echo 'selected'; ?>>
                                <?php echo $proprietario['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <label for="modelo" class="form-label">Modelo:</label>
                    <input type="text" name="modelo" class="form-control" value="<?= $result["modelo"] ?>">
                </div>
                <div class="col">
                    <label for="ano" class="form-label">Ano:</label>
                    <input type="text" name="ano" class="form-control" value="<?= $result["ano"] ?>">
                </div>
                <div class="col">
                    <label for="cor" class="form-label">Cor:</label>
                    <input type="text" name="cor" class="form-control" value="<?= $result["cor"] ?>">
                </div>
                <div class="col">
                    <label for="marca" class="form-label">Marca:</label>
                    <select name="marca" id="marca" class="form-select">
                        <option value="">Selecione uma marca</option>
                        <?php foreach ($marcas as $marca): ?>
                            <option value="<?php echo $marca['idmarca']; ?>" <?php if ($marca['idmarca'] == $result['idmarca']) echo 'selected'; ?>>
                                <?php echo $marca['marca']; ?></option>
                        <?php endforeach; ?>
                    </select>
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
