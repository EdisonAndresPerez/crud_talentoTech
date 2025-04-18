<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitaciones-Crud</title>
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
            <h1 class="titulo_principal">Habitaciones</h1>
        <div class="botones_info">
            <button type="button" class="boton_agregar">Agregar Habitacion</button>
        </div>
        <form class="formulario_empleado" action="create.php" method="POST" onsubmit="return validarFormulario()">
            <div class="form-content">
                <input type="number" name="numero" placeholder="Ingrese el número de su habitacion" required>
                <input type="text" name="tipo" placeholder="Ingrese el tipo de habitacion que requiere" required>
                <input type="number" name="capacidad" placeholder="Ingrese la capacidad de personas" required>
                <select name="estado" required>
                    <option value="">Seleccionar estado de la habitacion</option>
                    <option value="Limpieza">Limpieza</option>
                    <option value="Ocupado">Ocupado</option>
                    <option value="Disponible">Disponible</option>
                    <option value="Reservado">Reservado</option>
                </select>     
                <input type="text" name="precio_noche" placeholder="Ingrese el valor de precio noche" required>
                <input type="text" name="descripcion" placeholder="Ingrese la descripcion de la habitacion" required>
                <button type="submit">Cargar</button>
            </div>
        </form>

        <h2>Reservaciones Existentes de Habitaciones</h2>
        <table class="flex">
            <tr>
                <th>ID</th>
                <th>Numero</th>
                <th>Tipo</th>
                <th>Capacidad</th>
                <th>Estado</th>
                <th>Precio Noche</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
            <?php include 'read.php'; ?>
        </table>
    </div>
</div>

<script src="./js/script.js"></script>
</body>
</html>
