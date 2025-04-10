<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes-Crud</title>
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
                <li><a href="crud_hotel_v2/index.php"><i class="fas fa-user"></i> Sergio Gonzales</a></li>
                <li><a href="#"><i class="fas fa-calendar-alt"></i> Reservas</a></li>
                <li><a href="#"><i class="fas fa-file-invoice-dollar"></i> Facturación</a></li>
                <li><a href="#"><i class="fas fa-users"></i> Empleados</a></li>
                <li><a href="#"><i class="fas fa-bed"></i> Habitaciones</a></li>
                <li><a href="#"><i class="fas fa-user-tag"></i> Clientes</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Contenido principal -->
    <div class="content">
            <h1 class="titulo_principal">Clientes</h1>
        <div class="botones_info">
            <button type="button" class="boton_agregar">Agregar clientes</button>
        </div>
        <form class="formulario_clientes" action="create.php" method="POST" onsubmit="return validarFormulario()">
            <div class="form-content">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <select name="tipo_doc" required>
                    <option value="">Seleccione el tipo de documento</option>
                    <option value="cc">cc</option>
                    <option value="pasaporte">pasaporte</option>
                </select>     
                <input type="text" name="numero_doc" placeholder="Numero de Documento" required>
                <input type="text" name="telefono" placeholder="Telefono" required>
                <input type="text" name="correo" placeholder="Correo" required>
                <button type="submit">Cargar</button>
            </div>
        </form>

        <h2>Clientes Existentes</h2>
        <table class="flex">
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Tipo De Documeto</th>
                <th>Numero De Documento</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Acciones</th>
                
                
            </tr>
            <?php include 'read.php'; ?>
        </table>
    </div>
</div>

<script src="js/script.js"></script>
</body>
</html>
