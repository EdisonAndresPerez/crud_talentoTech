<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados-Crud</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<div class="layout">
    <!-- Aside -->
    <aside class="sidebar">
        <div class="logo">
            <h2>Ibagué Hotel</h2>
        </div>
        <nav>
            <ul>
                <li><a href="#"><i class="fas fa-user"></i> Sergio Gonzales</a></li>
                <li><a href="#"><i class="fas fa-calendar-alt"></i> Reservas</a></li>
                <li><a href="#"><i class="fas fa-file-invoice-dollar"></i> Facturación</a></li>
                <li><a href="/crud_talentoTech/empleados/index.php"><i class="fas fa-users"></i> Empleados</a></li>
                <li><a href="/crud_talentoTech/Habitaciones/index.php"><i class="fas fa-bed"></i> Habitaciones</a></li>
                <li><a href="/crud_talentoTech/clientes/index.php"><i class="fas fa-user-tag"></i> Clientes</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Contenido principal -->
    <div class="content">
            <h1 class="titulo_principal">Empleados</h1>
        <div class="botones_info">
            <button type="button" class="boton_agregar">Agregar Empleado</button>
        </div>
        <form class="formulario_empleado" action="create.php" method="POST" onsubmit="return validarFormulario()">
            <div class="form-content">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
                <input type="text" name="telefono" placeholder="Teléfono" required>
                <input type="text" name="cargo" placeholder="Cargo" required>
                <input type="text" name="departamento" placeholder="Departamento" required>
                <input type="date" name="fecha_entrada" required>
                <input type="date" name="fecha_salida" required>
                <input type="number" name="precio" placeholder="Salario en COP" required>
                <select name="estado" required>
                    <option value="">Seleccionar estado del empleado</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>     
                <input type="text" name="horario" placeholder="Horario (ej: 8:00 - 17:00)" required>
                <button type="submit">Cargar</button>
            </div>
        </form>

        <h2>Reservaciones Existentes de Empleados</h2>
        <table class="flex">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Cargo</th>
                <th>Departamento</th>
                <th>Fecha de Entrada</th>
                <th>Fecha de Salida</th>
                <th>Salario</th>
                <th>Estado</th>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
            <?php include 'read.php'; ?>
        </table>
    </div>
</div>

<script src="./js/script.js"></script>
</body>
</html>
