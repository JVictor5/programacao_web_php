<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Editar Carro</h1>
                <form action="{{ route('cars.update', $car) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="model" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="model" name="model" value="{{ $car->model }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Ano</label>
                        <input type="text" class="form-control" id="year" name="year" value="{{ $car->year }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Cor</label>
                        <input type="text" class="form-control" id="color" name="color" value="{{ $car->color }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Marca</label>
                        <select class="form-select" id="brand" name="brand">
                            @foreach($brands as $brand)
                                <option value="{{ $brand }}" {{ $car->brand == $brand ? 'selected' : '' }}>{{ $brand }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Imagem</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <img src="/images/{{ $car->image }}" class="mt-2 img-thumbnail" style="width: 100px;"
                            alt="Car Image">
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>