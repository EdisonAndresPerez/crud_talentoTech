<?php
require 'db.php';

if (isset($_POST['update'])) {
    $update_id = $_POST['update_id'];
    $update_nombre = $_POST['update_nombre'];
    $update_tipo_doc = $_POST['update_tipo_doc'];
    $update_numero_doc = $_POST['update_numero_doc'];
    $update_telefono = $_POST['update_telefono'];
    $update_correo = $_POST['update_correo'];
   

    $update_query = "UPDATE clientes SET 
    nombre = '$update_nombre', 
    tipo_doc= '$update_tipo_doc', 
    numero_doc = '$update_numero_doc', 
    telefono = '$update_telefono', 
    correo = '$update_correo'
    WHERE id = $update_id";


    if (mysqli_query($conn, $update_query)) {
        header("Location: index.php?mensaje=¡Reservación actualizada exitosamente!");
    } else {
        echo "Error al actualizar la clinete: " . mysqli_error($conn);
    }
}
?>