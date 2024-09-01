<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Reserva</title>
    <style>
        body {
            background-image: url('https://i.pinimg.com/474x/74/12/00/7412006d2746c5fd062f1a95b33defb6.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #000000;
            font-family: Arial, sans-serif;
        }
        .form-container {
            width: 40%;
            margin: auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6); /* Fondo medio oscuro */
            color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        input, select, textarea {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #ffffff;
            color: #000000;
        }
        input[readonly], select[disabled], textarea[readonly] {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .carousel-container {
            position: relative;
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            overflow: hidden;
            border: 2px solid #ddd; /* Borde opcional */
            border-radius: 8px; /* Esquinas redondeadas opcional */
        }
        .carousel-images {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .carousel-images img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .carousel-button {
            position: absolute;
            top: 50%;
            width: 40px;
            height: 40px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .carousel-button.prev {
            left: 10px;
        }
        .carousel-button.next {
            right: 10px;
        }
    </style>
</head>
<body>
    <h2><center>Ver reserva</center></h2>

    <!-- Formulario para buscar la reserva por ID -->
    <center><form method="post" action="">
        <label for="id">ID de la Reserva:</label>
        <input type="number" name="id" required>
        <button type="submit" name="buscar">Buscar Reserva</button>
    </form></center>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $tabla1 = "tabla1";  // Definir la variable con el nombre de la tabla

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "base1");

    // Verificar conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta para buscar por ID en la tabla definida
    $sql = "SELECT id, nombre, apellido, correo_electronico, celular, fecha, hora, duracion, servicio, genero, comentarios FROM $tabla1 WHERE id = ?";
    
    // Preparar la consulta
    if ($stmt = $conexion->prepare($sql)) {
        // Enlazar el parámetro
        $stmt->bind_param("i", $id);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener los resultados
        $result = $stmt->get_result();

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            echo "<h2>Resultados:</h2>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Correo Electrónico</th><th>Celular</th><th>Fecha</th><th>Hora</th><th>Duración</th><th>Servicio</th><th>Género</th><th>Comentarios</th></tr>";

            // Mostrar los resultados en la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["apellido"] . "</td>";
                echo "<td>" . $row["correo_electronico"] . "</td>";
                echo "<td>" . $row["celular"] . "</td>";
                echo "<td>" . $row["fecha"] . "</td>";
                echo "<td>" . $row["hora"] . "</td>";
                echo "<td>" . $row["duracion"] . "</td>";
                echo "<td>" . $row["servicio"] . "</td>";
                echo "<td>" . $row["genero"] . "</td>";
                echo "<td>" . $row["comentarios"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No se encontraron resultados para el ID proporcionado.</p>";
        }

        // Cerrar la declaración y la conexión
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }

    $conexion->close();
}
?>
