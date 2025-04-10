<?php
require 'db.php';

$consulta_hotel = mysqli_query($conn, "SELECT * FROM habitaciones");

if (mysqli_num_rows($consulta_hotel) > 0) {
    while ($row = mysqli_fetch_assoc($consulta_hotel)) {

        // Asignar clase CSS según estado
        switch ($row['estado']) {
            case 'disponible':
                $clase_estado = 'estado-disponible';
                break;
            case 'ocupado':
                $clase_estado = 'estado-ocupado';
                break;
            case 'reservado':
                $clase_estado = 'estado-reservado';
                break;
            case 'limpieza':
                $clase_estado = 'estado-limpieza';
                break;
            default:
                $clase_estado = '';
                break;
        }

        // Escapar valores para atributos HTML
        $id = (int)$row['id'];
        $numero = htmlspecialchars($row['numero'], ENT_QUOTES);
        $tipo = htmlspecialchars($row['tipo'], ENT_QUOTES);
        $capacidad = htmlspecialchars($row['capacidad'], ENT_QUOTES);
        $estado = htmlspecialchars($row['estado'], ENT_QUOTES);
        $precio_noche = htmlspecialchars($row['precio_noche'], ENT_QUOTES);
        $descripcion = htmlspecialchars($row['descripcion'], ENT_QUOTES);

        echo "<tr>
                <td>{$id}</td>
                <td>{$numero}</td>
                <td>{$tipo}</td>
                <td>{$capacidad}</td>
                 <td class='{$clase_estado}'>{$row['estado']}</td>
                <td>\${$precio_noche}</td>
                <td>{$descripcion}</td>
                <td>
                    <button onclick='eliminarReservacion({$id})'>Eliminar</button>
                    <button onclick='mostrarFormularioActualizar(
                        {$id},
                        \"{$numero}\",
                        \"{$tipo}\",
                        \"{$capacidad}\",
                        \"{$estado}\",
                        \"{$precio_noche}\",
                        \"{$descripcion}\"
                    )'>Actualizar</button>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No hay habitaciones registradas.</td></tr>";
}
?>
