<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manutenções</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Manutenções:</h1>
        <a href="/manutencao/insert" class="btn btn-primary">Nova Manutenção</a>
        <p><?= $mensagem ?></p>
        <table id="table" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Veículo</th>
                    <th>Tipo do problema</th>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($m = $result->fetch(PDO::FETCH_ASSOC)) { ?>

                    <tr>
                        <td><?= $m['modelo_veiculo'] ?></td>
                        <td><?= $m['tipo'] ?></td>
                        <td><?= $m['data'] ?></td>
                        <td><?= $m['descricao'] ?></td>
                        <td>
                            <a href="/manutencao/update/id/<?= $m['idManutencao'] ?>" class="btn btn-warning">Update</a>
                            <a href="/manutencao/delet/id/<?= $m['idManutencao'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var table = new DataTable('#table', {
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.6/i18n/pt-BR.json',
            },
        });
    </script>
</body>

</html>