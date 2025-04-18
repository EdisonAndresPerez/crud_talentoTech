<?php
require 'db.php';

if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM reservaciones WHERE id = $delete_id";

    if (mysqli_query($conn, $delete_query)) {
        header("Location: index.php?mensaje=¡Reservación eliminada exitosamente!");
        exit;
    } else {
        echo "Error al eliminar la reservación: " . mysqli_error($conn);
    }
} else {
    echo "ID inválido para eliminación.";
}
?>
