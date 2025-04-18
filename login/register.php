<?php
// Conexión a la base de datos
try {
    $conexion = new PDO("mysql:host=localhost;dbname=hotel_reservas1", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Procesar formulario
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena_usuario = password_hash($_POST['contrasena_usuario'], PASSWORD_DEFAULT); // Encriptar contraseña
    $correo_usuario = $_POST['correo_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    try {
        // Insertar datos en la tabla usuarios
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre_usuario, contrasena_usuario, correo_usuario, nombre, apellido, edad) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$nombre_usuario, $contrasena_usuario, $correo_usuario, $nombre, $apellido, $edad])) {
            // Redirigir al login si el registro es exitoso
            header("Location: index.php?mensaje=" . urlencode("✅ Usuario registrado con éxito. Por favor, inicia sesión."));
            exit;
        } else {
            $mensaje = "❌ Error al registrar usuario.";
        }
    } catch (PDOException $e) {
        $mensaje = "❌ Error en la base de datos: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f2940; /* Fondo similar al sidebar */
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 500px;
            margin: 60px auto;
            padding: 30px;
            background: #f1f1f1;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }

        .form-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 25px;
            color: #1b6d78; /* Color título tipo botón */
        }

        label {
            font-weight: 600;
            color: #0f2940;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-custom {
            background-color: #1b6d78; /* Azul petróleo */
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
        }
                
                .btn-custom {
            background-color: #1b6d78; /* Azul petróleo */
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            padding: 10px 15px;
        }

        .btn-custom:hover {
            background-color: #155c64; /* Azul más oscuro al pasar el mouse */
        }

        .btn-custom:hover {
            background-color: #155c64;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h4 class="form-title">Registrar Usuario</h4>
    <?php if ($mensaje): ?>
        <div class="alert alert-info"><?= $mensaje ?></div>
    <?php endif; ?>
    
    <form method="POST">
        <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" name="nombre_usuario" required>
        </div>
        <div class="mb-3">
            <label for="contrasena_usuario" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contrasena_usuario" required>
        </div>
        <div class="mb-3">
            <label for="correo_usuario" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="correo_usuario" required>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" required>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" name="edad" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-custom">Registrar Usuario</button>
        </div>
    </form>
</div>
</body>
</html>