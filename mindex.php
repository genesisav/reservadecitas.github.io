<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar datos</title>
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

    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Buscar y Modificar Datos</h2>
    
    <!-- Formulario de búsqueda -->
    <form id="searchForm" class="mb-4">
        <div class="input-group">
            <input type="text" id="searchId" class="form-control" placeholder="Ingresa el ID para buscar" required>
            <button type="button" class="btn btn-primary" onclick="buscarDatos()">Buscar</button>
        </div>
    </form>

    <!-- Formulario de modificación -->
    <form id="editForm" method="post" action="modificar.php" style="display: none;">
        <input type="hidden" id="editId" name="id">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="mb-3">
            <label for="correo_electronico" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
        </div>
        <div class="mb-3">
            <label for="celular" class="form-label">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular" required>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
        </div>
        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" class="form-control" id="hora" name="hora" required>
        </div>
        <div class="mb-3">
            <label for="duracion" class="form-label">Duración</label>
            <input type="text" class="form-control" id="duracion" name="duracion" required>
        </div>
        <div class="mb-3">
            <label for="servicio" class="form-label">Servicio</label>
            <input type="text" class="form-control" id="servicio" name="servicio" required>
        </div>
        <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
            <select class="form-select" id="genero" name="genero" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="comentarios" class="form-label">Comentarios</label>
            <textarea class="form-control" id="comentarios" name="comentarios" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </form>
</div>

<!-- Enlace a jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>