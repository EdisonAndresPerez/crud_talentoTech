<?php
require 'db.php';

if (isset($_POST['update'])) {
    // Recoger y validar los datos del formulario
    $update_id = $_POST['update_id'] ?? null;
    $update_numero = trim($_POST['update_numero'] ?? '');
    $update_tipo = trim($_POST['update_tipo'] ?? '');
    $update_descripcion = trim($_POST['update_descripcion'] ?? '');
    $update_precio_noche = trim($_POST['update_precio_noche'] ?? '');
    $update_estado = trim($_POST['update_estado'] ?? '');
    $update_capacidad = trim($_POST['update_capacidad'] ?? '');

    // Validar que los campos obligatorios no estén vacíos
    if (empty($update_id) || empty($update_numero) || empty($update_tipo) || empty($update_precio_noche) || empty($update_estado) || empty($update_capacidad)) {
        echo "Error: Todos los campos obligatorios deben ser completados.";
        exit;
    }

    // Validar que 'precio_noche' sea un número válido
    if (!is_numeric($update_precio_noche)) {
        echo "Error: El campo 'precio_noche' debe ser un número válido.";
        exit;
    }

    // Preparar la consulta SQL con sentencias preparadas para prevenir inyecciones SQL
    $update_query = "UPDATE habitaciones SET 
        numero = ?, 
        tipo = ?, 
        descripcion = ?, 
        precio_noche = ?, 
        estado = ?,
        capacidad = ?
        WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $update_query)) {
        // Vincular los parámetros
        mysqli_stmt_bind_param($stmt, "ssssssi", $update_numero, $update_tipo, $update_descripcion, $update_precio_noche, $update_estado, $update_capacidad, $update_id);

        // Ejecutar la consulta
        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php?mensaje=¡Reservación actualizada exitosamente!");
            exit;
        } else {
            echo "Error al actualizar la reservación: " . mysqli_stmt_error($stmt);
        }

        // Cerrar la sentencia
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la consulta: " . mysqli_error($conn);
    }
}
?>
