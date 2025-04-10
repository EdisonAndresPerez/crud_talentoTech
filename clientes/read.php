<?php
require 'db.php';

// Consulta para obtener los datos de la tabla clientes
$consulta_hotel = mysqli_query($conn, "SELECT * FROM clientes");

if (mysqli_num_rows($consulta_hotel) > 0) {
    while ($row = mysqli_fetch_assoc($consulta_hotel)) {
        // Imprimir la fila de la tabla con los datos del cliente
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['nombre']) . "</td>
                <td>" . htmlspecialchars($row['tipo_doc']) . "</td>
                <td>" . htmlspecialchars($row['numero_doc']) . "</td>
                <td>" . htmlspecialchars($row['telefono']) . "</td>
                <td>" . htmlspecialchars($row['correo']) . "</td>
                <td>
                    <button onclick='eliminarcliente(" . htmlspecialchars($row['id']) . ")'>Eliminar</button>
                    <button onclick='mostrarFormularioActualizar(
                        " . htmlspecialchars($row['id']) . ",
                        \"" . htmlspecialchars($row['nombre']) . "\",
                        \"" . htmlspecialchars($row['tipo_doc']) . "\",
                        \"" . htmlspecialchars($row['numero_doc']) . "\",
                        \"" . htmlspecialchars($row['telefono']) . "\",
                        \"" . htmlspecialchars($row['correo']) . "\"
                    )'>Actualizar</button>
                </td>
            </tr>";
    }
} else {
    // Mensaje cuando no hay clientes registrados
    echo "<tr><td colspan='7'>No hay clientes registrados.</td></tr>";
}
?>