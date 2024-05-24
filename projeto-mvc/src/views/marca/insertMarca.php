<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir marca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Inserir marca</h3>
        </div>
        <form action="/marca/new" method="post">
            <div class="row mt-4">
                <div class="col-46">
                    <label for="" class="form-label">Marca:</label>
                    <input type="text" name="marca" class="form-control">
                </div>
                <div class="col-46">
                    <label for="" class="form-label">Pais:</label>
                    <input type="text" name="pais" class="form-control">
                </div>
                <div class="row text-center">
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