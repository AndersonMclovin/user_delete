<?php

$id = $_REQUEST["id"];

// Conexión a la base de datos (debes configurar esto)
$conexion = new mysqli("localhost", "root", getenv('DB_PASSWORD'), "coordinacion");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Actualiza el registro en la base de datos
$sql = "select * from USERS WHERE id=$id";

$username;
$email;
$nombre;


if ($resultado=$conexion->query($sql)) {
    if($registro=$resultado->fetch_assoc()) {
        $username= $registro["username"];
        $email= $registro["email"];
        $nombre= $registro["nombre"];
        
    } else {
        header("Location: index.php");
        return;
    }
    //echo "Usuario actualizado correctamente.";
} else {
    echo "Error al actualizar usuario: " . $conexion->error;
}

$conexion->close();

?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
   
    <title>Document</title>
    
</head>
<body>
    
        <form id="updateForm" action="servidor.php?id=<?php echo $id?>" method="post">
            
            <br>
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" >
            <br>
            <label for="email">Correo Electrónico:</label>
            <input type="text" id="email" name="email"   value="<?php echo $email; ?>">
            <br>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre"  value="<?php echo $nombre; ?>">
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
            <br>
            <input type="submit" value="Actualizar">
        </form>


    



    
</body>
</html>