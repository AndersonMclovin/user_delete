<?php
$conn = mysqli_connect("localhost", "root", getenv('DB_PASSWORD'), "coordinacion");

if (!$conn) {
    die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-4">
<button class="btn btn-success" onclick="location.href='./create.php'">Agregar</button>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["nombre"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td>
                        <button class="btn btn-primary" id="btnEditar"><a id="btn-editar" href="formularioUp.php?id=<?php echo $row["id"]; ?>">Editar</a></button>
                        <button class="btn btn-danger" id="btnEliminar<?php echo $row["id"]; ?>">Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
    <script>
        $(document).ready(function() {

            $('button[id^="btnEliminar"]'<?php echo $row["id"]; ?>).click(function() {
                var id = $(this).attr('id').substr(11); 
                if (window.confirm("Esta seguro de eliminar?")) {
                    document.location.href = 'delete.php?id='+id;
                }
            }); 
        });
        
        
    </script>
</body>
</html>

<style>
    #btn-editar, #btn-eliminar{
        color : white;
    }
</style>
<?php
mysqli_close($conn);
?>