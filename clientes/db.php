<?php
// Archivo: db.php
// Descripción: Este archivo se encarga de establecer la conexión con la base de datos MySQL.

// Configuración de la conexión
$host = 'localhost';            // Dirección del servidor de base de datos.
$user = 'root';                 // Usuario de la base de datos.
$password = '';                 // Contraseña del usuario.
$database = 'hotel_reservas1';  // Nombre de la base de datos.

// Crear la conexión con la base de datos
$conn = mysqli_connect($host, $user, $password, $database);

// Verificar si la conexión fue exitosa
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}

// Configurar el conjunto de caracteres
mysqli_set_charset($conn, "utf8");

// Nota: No cerramos la conexión aquí, se cierra después de usarla en cada script.
?>
