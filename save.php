<?php

    $conn = new mysqli("localhost", "root", "", "coordinacion" ); 
    if( $conn->connect_errno ) {
        echo "Falla al conectarse a Mysql ( ". $conn->connect_errno . ") " .
            $conn->connect_error ;
    }else{
        echo "Conecto";
    }


    $username = $_POST['username'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $repetir_contrasena = $_POST['repetir-contrasena'];


    $mensaje = array();
    $mensaje['msj'] = "";
    $mensaje['estado'] = "";

    if ($contrasena != $repetir_contrasena) {
        $mensaje['msj'] = "Contraseñas diferentes";
        $mensaje['estado'] = "Error";
        echo json_encode();
        return;
    }


    if (isset( $username) && isset($nombre) &&
    isset($email) && isset($contrasena) && isset($repetir_contrasena)){      
        try {
            $sql = "INSERT INTO users VALUES (NULL, '". $username ."' , sha2( '". $contrasena ."', 256 ), '". $nombre ."', '". $email ."')";
        
            if ($conn->query($sql) === TRUE) {
                echo "Paso if";
                $mensaje["msg"]="Se Almaceno Correcto";
                $mensaje["estado"]="OK";
                echo json_encode($mensaje);
            } else {
                $mensaje["msg"]="No Se Almaceno la información";
                $mensaje["estado"]="Error";
                echo json_encode($mensaje);
            }
            } catch (\Throwable $th) {
                echo $th;
            }
        

    } else {
        $mensaje = array();
        $mensaje["msg"]="Datos Incompletos";
        $mensaje["estado"]="Error";
        echo json_encode($mensaje);
    }