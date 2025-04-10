<?php
require 'db.php'; // asegúrate que db.php tiene la conexión

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numero = $_POST['numero'];
    $tipo = $_POST['tipo'];
    $capacidad = $_POST['capacidad'];
    $estado = $_POST['estado'];
    $precio_noche = $_POST['precio_noche'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO habitaciones (numero, tipo, capacidad, estado, precio_noche, descripcion) 
            VALUES ('$numero', '$tipo', '$capacidad', '$estado', '$precio_noche', '$descripcion')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php"); // redirecciona si todo sale bien
        exit();
    } else {
        echo "Error: " . mysqli_error($conn); // muestra el error
    }
}
?>
