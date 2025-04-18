<?php
session_start();

try {
    $conexion = new PDO("mysql:host=localhost;dbname=hotel_reservas1", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena_usuario = $_POST['contrasena_usuario'];

    // Consulta para verificar el usuario
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :nombre_usuario");
    $stmt->bindParam(':nombre_usuario', $nombre_usuario);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($contrasena_usuario, $usuario['contrasena_usuario'])) {
        // Guardar datos del usuario en la sesión
        $_SESSION['usuario'] = $usuario['nombre'];
        header("Location: /crud_talentoTech/empleados/index.php");
        exit;
    } else {
        // Redirigir al login con mensaje de error
        header("Location: index.php?mensaje=" . urlencode("❌ Usuario o contraseña incorrectos."));
        exit;
    }
}
?>