<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Agregar usuario</title>
</head>
<body>
    <div class="container">
        <h1>Crear Usuario</h1>
        <form action="save.php" method="post">
            <label>Username: </label>
            <input type="text" name="username">
            <br>
            <label>Nombre: </label>
            <input type="text" name="nombre">
            <br>
            <label>Email: </label>
            <input type="email" name="email">
            <br>
            <label>Contraseña: </label>
            <input type="password" name="contrasena">
            <br>
            <label>Repetir contraseña: </label>
            <input type="password" name="repetir-contrasena">
            <br>
            <input type="submit" value="Guardar">
            <input type="button" value="Volver">
        </form>
    </div>



    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>