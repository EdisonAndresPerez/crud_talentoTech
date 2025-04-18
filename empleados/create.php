<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $cargo = mysqli_real_escape_string($conn, $_POST['cargo']);
    $departamento = mysqli_real_escape_string($conn, $_POST['departamento']);
    $fecha_entrada = $_POST['fecha_entrada'];
    $fecha_salida = $_POST['fecha_salida'];
    $precio = $_POST['precio'];
    $estado = $_POST['estado'];
    $horario = mysqli_real_escape_string($conn, $_POST['horario']);

    $sql = "INSERT INTO reservaciones 
    (nombre, apellido, telefono, cargo, departamento, fecha_entrada, fecha_salida, precio, estado, horario) 
    VALUES 
    ('$nombre', '$apellido', '$telefono', '$cargo', '$departamento', '$fecha_entrada', '$fecha_salida', '$precio', '$estado', '$horario')";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php?mensaje=Reservación registrada exitosamente');
        exit;
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Error al registrar: ' . mysqli_error($conn)
        ]);
    }
}

mysqli_close($conn);
?>
