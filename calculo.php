<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Citas</title>
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

    <script>
        function calcularCosto() {
            const servicio = document.getElementById("servicio").value;
            const duracion = parseInt(document.getElementById("duracion").value);
            const horaCita = parseInt(document.getElementById("horaCita").value);
            let costoBase = 0;
            let costoTotal = 0;

            // Cálculo 1: Establecer el costo base según el servicio
            if (servicio === "consulta") {
                costoBase = 50;
            } else if (servicio === "tratamiento") {
                costoBase = 100;
            } else if (servicio === "seguimiento") {
                costoBase = 30;
            }

            // Cálculo 2: Aumentar el costo en base a la duración de la cita
            costoTotal = costoBase + (duracion * 10);

            // Condición 1: Descuento del 10% si la cita es antes de las 12 pm
            if (horaCita < 12) {
                costoTotal *= 0.9;
            }

            // Condición 2: Aumento del 20% si la cita es en horario pico (4 pm - 6 pm)
            if (horaCita >= 16 && horaCita <= 18) {
                costoTotal *= 1.2;
            }

            // Mostrar el costo total en el HTML
            document.getElementById("costoTotal").innerText = "Costo Total: L" + costoTotal.toFixed(2);
        }
    </script>
</head>
<body>
    <center><h1>Sistema de citas</h1>
    <form>
        <label for="servicio">Selecciona el servicio:</label>
        <select id="servicio" name="servicio" required>
            <option value="consulta">Consulta</option>
            <option value="tratamiento">Tratamiento</option>
            <option value="seguimiento">Seguimiento</option>
        </select>
        <br><br>

        <label for="duracion">Duración de la cita (en horas):</label>
        <input type="number" id="duracion" name="duracion" min="1" max="8" required>
        <br><br>

        <label for="horaCita">Hora de la cita (24 horas):</label>
        <input type="number" id="horaCita" name="horaCita" min="8" max="18" required>
        <br><br>

        <button type="button" onclick="calcularCosto()">Calcular Costo</button>
    </form>

    <h2 id="costoTotal">Costo Total: L0.00</h2></center>
</body>
</html>