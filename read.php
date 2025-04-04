<?php
require 'db.php';

$consulta_hotel = mysqli_query($conn, "SELECT * FROM reservaciones");

if (mysqli_num_rows($consulta_hotel) > 0) {
    while ($row = mysqli_fetch_assoc($consulta_hotel)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['apellido']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['cargo']}</td>
                <td>{$row['departamento']}</td>
                <td>{$row['fecha_entrada']}</td>
                <td>{$row['fecha_salida']}</td>
                <td>{$row['precio']}</td>
                <td>{$row['estado']}</td>
                <td>{$row['horario']}</td>
                <td>
                    <button onclick='eliminarReservacion({$row['id']})'>Eliminar</button>
                    <button onclick='mostrarFormularioActualizar(
                        {$row['id']},
                        \"{$row['nombre']}\",
                        \"{$row['apellido']}\",
                        \"{$row['telefono']}\",
                        \"{$row['cargo']}\",
                        \"{$row['departamento']}\",
                        \"{$row['fecha_entrada']}\",
                        \"{$row['fecha_salida']}\",
                        {$row['precio']},
                        \"{$row['estado']}\",
                        \"{$row['horario']}\"
                    )'>Actualizar</button>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='12'>No hay empleados registrados.</td></tr>";
}
?>
