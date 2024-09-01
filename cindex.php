<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta general</title>
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
    <div class="container">
        <h1>Consulta general de reservas</h1>

        <!-- Mostrar los resultados en una tabla -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo Electrónico</th>
                    <th>Celular</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Duración</th>
                    <th>Servicio</th>
                    <th>Género</th>
                    <th>Comentarios</th>
                </tr>
            </thead>
            <body>
                <?php if ($result->id > 0): ?>
                    <?php while($base1 = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $base1['id']; ?></td>
                            <td><?php echo $base1['nombre']; ?></td>
                            <td><?php echo $base1['apellido']; ?></td>
                            <td><?php echo $base1['correo_electronico']; ?></td>
                            <td><?php echo $base1['celular']; ?></td>
                            <td><?php echo $base1['fecha']; ?></td>
                            <td><?php echo $base1['hora']; ?></td>
                            <td><?php echo $base1['duracion']; ?></td>
                            <td><?php echo $base1['servicio']; ?></td>
                            <td><?php echo $base1['genero']; ?></td>
                            <td><?php echo $base1['comentarios']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11">No se encontraron resultados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>