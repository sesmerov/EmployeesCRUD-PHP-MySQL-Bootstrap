<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTADO DE EMPLEADOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="text/javascript" src="web/js/script.js"></script>
</head>

<body>
    <header>
        <h1 class="text-center py-3 bg-primary">LISTADO DE EMPLEADOS</h1>
    </header>
    <main>
        <div class="container">
            <a href="index.php?order=Add" class="btn btn-success m-3">AÑADIR NUEVO EMPLEADO</a>
            <table class="table table-striped ">
                <thead>
                    <tr class="text-center">
                        <th class="bg-secondary text-white">ID</th>
                        <th class="bg-secondary text-white">NOMBRE</th>
                        <th class="bg-secondary text-white">APELLIDO</th>
                        <th class="bg-secondary text-white">TELÉFONO</th>
                        <th class="bg-secondary text-white">EMAIL</th>
                        <th class="bg-secondary text-white">DEPARTAMENTO</th>
                        <th class="bg-secondary text-white">PUESTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employeesList  as $employee): ?>
                        <tr>
                            <td><?= $employee->id ?></td>
                            <td><?= $employee->first_name ?></td>
                            <td><?= $employee->last_name ?></td>
                            <td><?= $employee->phone ?></td>
                            <td><?= $employee->email ?></td>
                            <td><?= $employee->department ?></td>
                            <td><?= $employee->job_title ?></td>
                            <td><a href="index.php?order=Modify&id=<?= $employee->id ?>" class="btn btn-warning">EDITAR</a></td>
                            <td><a href="#" onclick="confirmDelete('<?= $employee->id ?>','<?= $employee->first_name ?>','<?= $employee->last_name ?>')" class="btn btn-danger">BORRAR</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <div>
                    <p>Numero total de empleados: <span class="fw-bolder"><?= $totalNumEmployees ?></span></p>
                </div>
                <form method="get">
                    <button class="btn btn-secondary" name="order" value="Start">Inicio</button>
                    <button class="btn btn-secondary" name="order" value="Last">Anterior</button>
                    <button class="btn btn-secondary" name="order" value="Next">Siguiente</button>
                    <button class="btn btn-secondary" name="order" value="End">Fin</button>
                </form>
            </div>
        </div>
    </main>

</body>

</html>