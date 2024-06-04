<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Proprietário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Update Proprietário</h3>
        </div>
        <form action="/proprietario/edit" method="post">
            <input type="hidden" name="id" value="<?= $result["idproprietario"] ?>">
            <div class="row mt-4">
                <div class="col">
                    <label for="nome" class="form-label">Nome do Proprietário:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="<?= $result["nome"] ?>">
                </div>
                <div class="col">
                    <label for="end" class="form-label">Endereço:</label>
                    <input type="text" name="end" id="end" class="form-control" value="<?= $result["endereco"] ?>">
                </div>
                <div class="col">
                    <label for="tele" class="form-label">Telefone:</label>
                    <input type="text" name="tele" id="tele" class="form-control" value="<?= $result["telefone"] ?>">
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