<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir marca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Excluir marca</h3>
        </div>
        <form action="/marca/deletar" method="post">
            <input type="hidden" name="id" value="<?= $result["idmarca"] ?>">
            <div class="row mt-4">
                <div class="col-6">
                    <label for="" class="form-label">Marca:</label>
                    <input type="text" name="marca" class="form-control" value="<?= $result["marca"] ?>">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Pais:</label>
                    <input type="text" name="pais" class="form-control" value="<?= $result["pais"] ?>">
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