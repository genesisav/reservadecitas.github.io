<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar reserva</title>
</head>
<body>
  <style>
    body {
        background-image: url('https://i.pinimg.com/474x/74/12/00/7412006d2746c5fd062f1a95b33defb6.jpg');
    }
    .form-container {
        width: 20%;
        margin: auto;
        padding: 10px;
        background-color: rgba(0, 0, 0, 0.0); /* Fondo medio oscuro */
        color: #000000;
        border-radius: 0px;
        box-shadow: 0 0 0px rgba(22, 48, 28, 0.021);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    input, select, textarea {
        width: 20%;
        padding: 10px;
        margin: 8px 0;
        border-radius: 8px;
        border: 0px solid #ccc;
    }
</style>
<form action="eliminar.php" method="post" style="text-align: center;">
        <label for="codigo"><h1>Codigo de la reserva a eliminar:</h1></label>
        <br>
        <input type="text" id="codigo" name="codigo" required>
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>