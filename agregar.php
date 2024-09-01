<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";  // Cambia esto si tu usuario es diferente
$password = "";  // Cambia esto si tienes una contraseña
$dbname = "base1";  // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo_electronico = $_POST['correo_electronico'];
$celular = $_POST['celular'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$duracion = $_POST['duracion'];
$servicio = $_POST['servicio'];
$genero = $_POST['genero'];
$comentarios = $_POST['comentarios'];

// Preparar y ejecutar la consulta SQL
$stmt = $conn->prepare("INSERT INTO tabla1 (id, nombre, apellido, correo_electronico, celular, fecha, hora, duracion, servicio, genero, comentarios) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssssssss", $id, $nombre, $apellido, $correo_electronico, $celular, $fecha, $hora, $duracion, $servicio, $genero, $comentarios);

if ($stmt->execute()) {
    echo "Datos guardados con éxito.";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>