<?php
// Conexión a la base de datos (debes configurar esto)
$conexion = new mysqli("localhost", "root", "", "coordinacion");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Obtén los datos del formulario

$userID = $_GET["id"];
$username = $_POST['username'];
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];

// Actualiza el registro en la base de datos
$sql = "UPDATE USERS SET username='$username', email='$email', nombre='$nombre', password='$password' WHERE id=$userID";

if ($conexion->query($sql) === TRUE) {
    echo "Usuario actualizado correctamente.";
} else {
    echo "Error al actualizar usuario: " . $conexion->error;
}

$conexion->close();
?>