<?php
// Configuración de la base de datos
$nombreservidor = "localhost";
$nombreusuario = "root";
$contraseña = "";
$nombre_base_de_datos = "base1";

// Crear conexión
$conn = new mysqli($nombreservidor, $nombreusuario, $contraseña, $nombre_base_de_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar variables para la reserva
$reserva = null;

// Verificar si se envió el formulario de búsqueda
if (isset($_POST['buscar'])) {
    $id = $_POST['id'];

    // Consultar los datos de la reserva por ID
    $sql = "SELECT * FROM reservas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Si se encontró la reserva
    if ($resultado->num_rows > 0) {
        $base1 = $resultado->fetch_assoc();
    } else {
        echo "<p>No se encontró la reserva con el ID proporcionado.</p>";
    }

    $stmt->close();
}

$conn->close();
?>