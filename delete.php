<?php
include('conexion.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];
    
    $sql = "DELETE FROM users WHERE id = $user_id";
    if (mysqli_query($conn, $sql)) {
        echo "Usuario eliminado correctamente.";
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar usuario: " . mysqli_error($conn);
    }
} else {
    echo "ID de usuario no válido.";
}

mysqli_close($conn);
?>

