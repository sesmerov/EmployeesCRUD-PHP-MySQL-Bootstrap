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

    </header>
    <main>
        <div class="container d-flex justify-content-center align-items-center mt-5">
            <form method="POST" class="p-4 border rounded shadow w-75">
                <div class="mb-3 row <?= $order == "Add" ? 'visually-hidden' : ''?> ">
                    <label for="id" class="col-sm-3 col-form-label fw-bold">ID</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext " name="id" id="id" value="<?= $order == "Modify" ? "$employee->id": "" ?>" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="first_name" class="col-sm-3 col-form-label fw-bold">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $order == "Modify" ? "$employee->first_name": "" ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="last_name" class="col-sm-3 col-form-label fw-bold">Apellido</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $order == "Modify" ? "$employee->last_name": "" ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="phone" class="col-sm-3 col-form-label fw-bold">Teléfono</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $order == "Modify" ? "$employee->phone": "" ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-3 col-form-label fw-bold">Correo Electrónico</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="email" value="<?= $order == "Modify" ? "$employee->email": "" ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="department" class="col-sm-3 col-form-label fw-bold">Departamento</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="department" id="department" value="<?= $order == "Modify" ? "$employee->department": "" ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="job_title" class="col-sm-3 col-form-label fw-bold">Puesto</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="job_title" id="job_title" value="<?= $order == "Modify" ? "$employee->job_title": "" ?>">
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