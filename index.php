<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados-Crud</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
    <h1>Empleados</h1>
    <form action="create.php" method="POST" onsubmit="return validarFormulario()">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="apellido" placeholder="Apellido" required>
    <input type="text" name="telefono" placeholder="Teléfono" required>
    <input type="text" name="cargo" placeholder="Cargo" required>
    <input type="text" name="departamento" placeholder="Departamento" required>
    <input type="date" name="fecha_entrada" required>
    <input type="date" name="fecha_salida" required>
    <input type="number" name="precio" placeholder="Salario en COP" required>

    <!-- Campo estado con opciones -->
    <select name="estado" required>
        <option value="">Seleccionar estado del empleado</option>
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
    </select>

    <input type="text" name="horario" placeholder="Horario (ej: 8:00 - 17:00)" required>


    <button type="submit">Cargar</button>
</form>


    <h2>Reservaciones Existentes</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>cargo</th>
            <th>departamento</th>
            <th>Fecha de Entrada</th>
            <th>Fecha de Salida</th>
            <th>salario</th>
            <th>estado</th>
            <th>horario</th>
            <th>Acciones</th>
        </tr>
        <?php include 'read.php'; ?>
    </table>
</div>
<script src="./js/script.js"></script>
</body>
</html>
