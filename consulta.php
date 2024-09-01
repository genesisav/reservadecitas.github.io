<?php
    // Definir las variables de conexión
    $host = "localhost";
    $usuario = "root";  // Cambia 'usuario' por tu nombre de usuario real
    $contrasena = "";  // Cambia 'contraseña' por tu contraseña real
    $base1 = "base1";  // Nombre de la base de datos

    // Conexión a la base de datos
    $conexion = new mysqli($host, $usuario, $contrasena, $base1);

    // Verificar conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta de datos
    $sql_select = "SELECT id, nombre, apellido, correo_electronico, celular, fecha, hora, duracion, servicio, genero, comentarios FROM tabla1";

    // Filtrar los resultados si se ha ingresado un término de búsqueda
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consultar'])) {
        $search = $_POST['search'];
        if (!empty($search)) {
            $search = $conexion->real_escape_string($search);
            $sql_select .= " WHERE nombre LIKE '%$search%' OR apellido LIKE '%$search%' OR correo_electronico LIKE '%$search%' OR celular LIKE '%$search%' OR comentarios LIKE '%$search%'";
        }
    }

    $result = $conexion->query($sql_select);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Correo Electrónico</th><th>Celular</th><th>Fecha</th><th>Hora</th><th>Duración</th><th>Servicio</th><th>Género</th><th>Comentarios</th></tr>";

        // Mostrar los datos en la tabla
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
        echo "<p>No se encontraron resultados.</p>";
    }

    // Cerrar la conexión
    $conexion->close();
    ?>