<?php
// Conexión a la base de datos (debes configurar esto)
/*
$conn = mysqli_connect("localhost", "root", getenv('DB_PASSWORD'), "coordinacion");

if (!$conn) {
    die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}*/

include("conexion.php");

// Obtén los datos del formulario

$userID = $_GET["id"];
$username = $_POST['username'];
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];



if ($username !=null && $nombre !=null &&
$email != null && $userID!=null){
    // Actualiza el registro en la base de datos
    if (count($password) > 0) {
        $sql = "UPDATE USERS SET username='$username', email='$email', nombre='$nombre', password= sha2('$password', 256) WHERE id=$userID";
    }else{
        $sql = "UPDATE USERS SET username='$username', email='$email', nombre='$nombre' WHERE id=$userID";
    }
    
    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado correctamente.";
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar usuario: " . $conexion->error;
    }
}





$conexion->close();
?>