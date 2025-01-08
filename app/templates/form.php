<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOMULARIO DE EMPLEADO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <header class="bg-primary">
        <?= $order == "Modify" ? '<h1 class="text-center py-3">MODIFICAR EMPLEADO </h1>' : "" ?>
        <?= $order == "Add" ? '<h1 class="text-center py-3">AÑADIR EMPLEADO </h1>' : "" ?>
        <?= $order == "Details" ? '<h1 class="text-center py-3">DETALLES DE EMPLEADO </h1>' : "" ?>

    </header>
    <main>
        <div class="container d-flex justify-content-center align-items-center mt-5">
            <form method="POST" class="p-4 border rounded shadow d-flex flex-column">
                <div class="mb-3 row <?= $order == "Add" ? 'visually-hidden' : ''?> ">
                    <label for="id" class="col-sm-4 col-form-label fw-bold">ID:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control-plaintext " name="id" id="id" value="<?= $order == "Modify" || $order == "Details" ? "$employee->id": "" ?>" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="first_name" class="col-sm-4 col-form-label fw-bold">Nombre:</label>
                    <div class="col-sm-8">
                        <input type="text" class=<?= $order == "Details"? "form-control-plaintext":"form-control"?> name="first_name" id="first_name" value="<?= $order == "Modify" || $order == "Details"  ? "$employee->first_name": "" ?>" <?= $order=="Details" ? "readonly": ""?>>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="last_name" class="col-sm-4 col-form-label fw-bold">Apellido:</label>
                    <div class="col-sm-8">
                        <input type="text" class=<?= $order == "Details"? "form-control-plaintext":"form-control"?> name="last_name" id="last_name" value="<?= $order == "Modify" || $order == "Details"  ? "$employee->last_name": "" ?>"<?= $order=="Details" ? "readonly": ""?>>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="phone" class="col-sm-4 col-form-label fw-bold">Teléfono:</label>
                    <div class="col-sm-8">
                        <input type="text" class=<?= $order == "Details"? "form-control-plaintext":"form-control"?> name="phone" id="phone" value="<?= $order == "Modify" || $order == "Details"  ? "$employee->phone": "" ?>"<?= $order=="Details" ? "readonly": ""?>>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-4 col-form-label fw-bold">Correo Electrónico:</label>
                    <div class="col-sm-8">
                        <input type="email" class=<?= $order == "Details"? "form-control-plaintext":"form-control"?> name="email" id="email" value="<?= $order == "Modify" || $order == "Details"  ? "$employee->email": "" ?>"<?= $order=="Details" ? "readonly": ""?>>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="department" class="col-sm-4 col-form-label fw-bold">Departamento:</label>
                    <div class="col-sm-8">
                        <input type="text" class=<?= $order == "Details"? "form-control-plaintext":"form-control"?> name="department" id="department" value="<?= $order == "Modify" || $order == "Details"  ? "$employee->department": "" ?>"<?= $order=="Details" ? "readonly": ""?>>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="job_title" class="col-sm-4 col-form-label fw-bold">Puesto:</label>
                    <div class="col-sm-8">
                        <input type="text" class=<?= $order == "Details"? "form-control-plaintext":"form-control"?> name="job_title" id="job_title" value="<?= $order == "Modify" || $order == "Details"  ? "$employee->job_title": "" ?>"<?= $order=="Details" ? "readonly": ""?>>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4 gap-2">
                    <?= $order == "Modify" ? '<input type="submit" class="btn btn-primary" name="order" value="Modify">' : "" ?>
                    <?= $order == "Add" ? '<input type="submit" class="btn btn-primary" name="order" value="Add">' : "" ?>
                    <input type="button" class="btn btn-secondary" value="Cancelar" onclick="history.back()">
                </div>
            </form>
        </div>
    </main>
</body>

</html>