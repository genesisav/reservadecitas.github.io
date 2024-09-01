<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base1";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del formulario
$id = $_POST['codigo'];

// Crear la consulta SQL para eliminar el registro
$sql = "DELETE FROM tabla1 WHERE id = ?";

// Preparar la consulta
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro eliminado exitosamente.";
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>