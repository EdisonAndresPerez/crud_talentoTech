<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $tipo_doc = mysqli_real_escape_string($conn, $_POST['tipo_doc']);
    $numero_doc = mysqli_real_escape_string($conn, $_POST['numero_doc']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
   
    $sql = "INSERT INTO clientes 
    (nombre, tipo_doc, numero_doc, telefono, correo) 
    VALUES 
    ('$nombre', '$tipo_doc', '$numero_doc', '$telefono', '$correo')";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php?mensaje=Cliente registrado exitosamente');
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
