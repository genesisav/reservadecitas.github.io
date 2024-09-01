<!DOCTYPE html>
<html>
<head>
    <title>Reserva de Cita</title>
    <style>
        body {
            background-image: url('https://i.pinimg.com/474x/74/12/00/7412006d2746c5fd062f1a95b33defb6.jpg');
        }
        .form-container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.0);
            color: #000000;
            border-radius: 0px;
            box-shadow: 0 0 0px rgba(22, 48, 28, 0.021);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        input, select, textarea {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 8px;
            border: 0px solid #ccc;
        }
        input[type="submit"] {
            background-color: #104936;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #104936;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1><center>Agregar reserva de cita</center></h1>
        <form action="agregar.php" method="post" enctype="multipart/form-data">
            <label for="id">ID:</label><br>
            <input type="text" id="id" name="id" placeholder="ID" required>

            <br><label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>

            <br><label for="apellido">Apellido:</label><br>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>

            <br><label for="email">Correo Electronico:</label><br>
            <input type="email" id="email" name="correo_electronico" placeholder="Correo Electronico" required>

            <br><label for="celular">Celular:</label><br>
            <input type="text" id="celular" name="celular" placeholder="Celular" required>

            <br><label for="fecha">Fecha de Registro:</label><br>
            <input type="date" id="fecha" name="fecha" required>

            <br><label for="hora">Hora:</label><br>
            <input type="time" id="hora" name="hora" required>

            <br><label for="duracion">Duracion (en horas):</label><br>
            <input type="number" id="duracion" name="duracion" min="1" max="8" placeholder="Duracion (en horas)" required>

            <br><label for="servicio">Servicio:</label><br>
            <select id="servicio" name="servicio" required>
                <option value="" disabled selected>Selecciona un servicio</option>
                <option value="consulta">Consulta</option>
                <option value="tratamiento">Tratamiento</option>
                <option value="seguimiento">Seguimiento</option>
            </select>

            <br><label>Genero:</label><br>
            <input type="radio" id="masculino" name="genero" value="Masculino" required><br>
            <label for="masculino">Masculino</label>
            <input type="radio" id="femenino" name="genero" value="Femenino" required>
            <label for="femenino">Femenino</label><br>

            <br><label for="comentarios">Comentarios:</label><br>
            <textarea id="comentarios" name="comentarios" placeholder="Comentarios"></textarea>

            <br><center><input type="submit" value="Reservar Cita"></center>
        </form>
    </div>
</body>
</html>